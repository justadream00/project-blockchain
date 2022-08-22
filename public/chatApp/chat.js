new Vue({
    el: "#appChat",
    data() {
        return {
            //       id: {{ auth()->id() }},
            tinNhan: "",
            //       users: [],
            //       messages: [],
        }
    },
    methods: {
        guiTinnhan() {
              axios.post('/mess', { tinNhandanhan: this.tinNhan })
              this.tinNhan = ""
        }
        //   },
        //   mounted() {
        //     const echo = new Echo({
        //       broadcaster: "socket.io"
        //     })
        //     echo.join('chat')
        //     .here((users) => {
        //       this.users = users
        //     })
        //     .listen('MessageSent', (event) => {
        //       this.messages.push(event);
        //     });
    },
})
