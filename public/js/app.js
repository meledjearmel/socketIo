(function($) {
    var socket = io.connect('http://localhost:1337', {transports: ['websocket', 'polling', 'flashsocket']})
    var msgtplme = $('#msgtplme').html()
    var msgtpluser = $('#msgtpluser').html()
    $('.msgtplme').remove()
    $('.msgtpluser').remove()

    var myself;

    $('#loginForm').submit(function (event) {
        event.preventDefault();
        socket.emit('login', {
            name: $('#name').val(),
            email: $('#email').val(),
            pass: $('#password').val()
        })
    })

    socket.on('newuser', function (user) {
        $('.contact-list-connected').append(`
            <a href="#" class="contact-list-link new pos-relative" id="${user.id}">
            <div class="d-flex">
            <div class="pos-relative">
                <img src="${user.avatar}" alt="">
                <div class="contact-status-indicator bg-success"></div>
            </div>
            <div class="contact-person">
                <p>${user.name}</p>
                <span>Clemson, CA</span>
            </div>
            <span class="tx-info tx-12"><span class="square-8 bg-info rounded-circle"></span> 1 new</span>
            </div>
            <div class="d-flex pos-absolute content-info-float">
            <div class="contact-person mg-r-10-force">
                <p>${user.name}</p>
                <span>Clemson, CA</span>
            </div>
            <span class="tx-info tx-12"><span class="square-8 bg-info rounded-circle"></span> 1 new</span>
            </div>
        </a>
        `)

        $('.notifications-list').append(`
        <a href="#" class="media-list-link read">
            <div class="media">
                <img src="${user.avatar}" alt="">
                <div class="media-body">
                    <p class="noti-text"><strong>${user.name}</strong> vient de se connecter.</p>
                </div>
            </div>
        </a>
        `)

        document.querySelector('.notification-circle').style.display = 'inline-block'
    })

    socket.on('disuser', function(user) {
        $('#' + user.id).remove();
    })

    socket.on('usrconnected', function (me) {
        $('.fade-mask').fadeOut()

        $('.nav-link-profile').append('<span class="logged-name hidden-md-down">' + me.name + '</span>')
        $('.nav-link-profile').append('<img src="' + me.avatar + '" class="wd-32 rounded-circle" alt="">')
        $('.nav-link-profile').append('<span class="square-10 bg-success"></span>')

        $('.name-info').append('<a href="#"><img src="' + me.avatar + '" class="wd-80 rounded-circle" alt=""></a>')
        $('.name-info').append('<h6 class="logged-fullname">' + me.name + '</h6>')
        $('.name-info').append('<p>' + me.email + '</p>')

        $('#message').focus()

        myself = me
    })

    $('.bell').on('click', function () {
        let bell = document.querySelector('.notification-circle')
        if (bell.style.display === 'inline-block') {
            bell.style.display = 'none'
        }
    })


    $('#msgform').submit(function (event) {
        event.preventDefault();
        if ($('#message').val() === '') {
            return false
        }
        let date = new Date()
        socket.emit('newmsg', {
            content: $('#message').val(),
            h: date.getHours(),
            m: date.getMinutes()
        })
        $('#message').val('')
        $('#message').focus()
    })

    socket.on('newmsg', function (message) {
       if (message.user.id === myself.id) {
           $('#messages').append(`<div class="media mg-t-20 text-right flex flex-row-reverse">${Mustache.render(msgtplme, message)}</div><div class="mg-t-20"></div>`)
       } else {
        $('#messages').append(`<div class="media">${Mustache.render(msgtpluser, message)}</div><div class="mg-t-20"></div>`)
       }
       $('.br-msg-body').animate({scrollTop: $('.br-msg-body').prop('scrollHeight')}, 50)
    })

})(jQuery)