var Mustache = require('mustache')
var md5 = require('MD5')
var http = require('http');
var users = {}

httpServer = http.createServer((req, res) => {
    res.end('Hello World')
});

httpServer.listen(1337);

var io = require('socket.io')(httpServer);

io.on('connection', (socket) => {
    var me = false;
    socket.on('login', function (user) {
        me = user
        me.id = user.email.replace('@', '-').replace('.', '-')
        me.avatar = 'https://gravatar.com/avatar/' + md5(user.email) + '?s=80';
        socket.broadcast.emit('newuser', me)
        socket.emit('usrconnected', me)
        users[me.id] = me
    })

    socket.on('disconnect', function() {
        if (!me) {
            return false
        }
        delete users[me.id]
        io.emit('disuser', me)
    })

    for (var k in users) {
        if (users[k].id === me.id) {
            continue
        }
        socket.emit('newuser', users[k])
    }


    socket.on('newmsg', function(message) {
        message.user = me;
        io.emit('newmsg', message)
    })
})