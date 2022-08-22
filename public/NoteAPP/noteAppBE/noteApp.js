new Vue({
    el: '#appmain',
    data: {
        myDiary: [],
        diary: {
            title: '',
            reason: '',
            content: '',
            name_writer: '',
            ask: '',
        },
    },
    created() {
        this.loadData();
    },
    methods: {
        loadData() {
            axios
                .get('/note-data')
                .then((res) => {
                    this.myDiary = res.data.noteData;
                });
        },
        create() {
            axios
                .post('/note-app', this.diary)
                .then((res) => {
                    toastr.success("Đã lưu thành công!");
                    this.loadData();
                })
                .catch((res) => {
                    var danh_sach_loi = res.response.data.errors;
                    $.each(danh_sach_loi, function(key, value) {
                        toastr.error(value[0]);
                    });
                });
        },

        deleteaNote(id) {
            axios
                .get('/delete-this-note/' + id)
                .then((res) => {
                    if(res.data.status) {
                        alert("Bạn sẽ xóa 1 note và không thể hoàn tác?");
                        toastr.success("Đã xóa Note thành công!");
                        this.loadData();
                    } else {
                        toastr.error("Vui lòng kiểm tra lại!");
                    }
                });
        },

        formatDate(datetime) {
            const input = datetime;
            const dateObj = new Date(input);
            const year = dateObj.getFullYear();
            const month = (dateObj.getMonth() + 1).toString().padStart(2, '0');
            const date = dateObj.getDate().toString().padStart(2, '0');

            const result = `${date}/${month}/${year}`;

            return result;
        },

        clear(){
            this.diary.title =" ";
            this.diary.reason =" ";
            this.diary.content =" ";
            this.diary.name_writer =" ";
            this.diary.ask =" ";
        },
        clearContent(){
            this.diary.content =" ";
        }


    },
});
