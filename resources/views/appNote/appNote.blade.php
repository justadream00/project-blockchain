<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note App</title>
    <link rel="stylesheet" href="/NoteAPP/appNoteFE/write.css">
    <link rel="stylesheet" href="/NoteAPP/appNoteFE/show.css">
    <link rel="stylesheet" href="/NoteAPP/appNoteFE/configPage.css">
    <link rel="stylesheet" href="/NoteAPP/appNoteFE/save.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"></script>
    @toastr_css
</head>

<body>

    <div id="appmain">
        <div class="container">
            <div class="row">
                <div class="title">
                    <a >
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Daily Diary
                    </a>
                </div>
            </div>


            <div class="row-one">
                <div id="notes-app">
                    <div class="config">
                        <textarea class="textt" placeholder="Viết nội dung chính" v-model="diary.content" required>
                        </textarea>
                        <i class="fa-solid fa-circle-xmark" v-on:click="clearContent()" ></i>
                    </div>


                    <div class="alert">
                        <div class="inputbox">
                            <input type="text" v-model="diary.title" required="required">
                            <span>Title</span>
                        </div>
                        <div class="inputbox">
                            <input type="text" v-model="diary.reason" required="required">
                            <span>Reason?</span>
                        </div>
                        <div class="inputbox">
                            <input type="text" v-model="diary.name_writer" required="required">
                            <span>Name</span>
                        </div>
                        <div class="inputbox">
                            <input type="text"v-model="diary.ask" required="required">
                            <span>Ques?</span>
                        </div>
                    </div>
                    <div class='view-it' >
                        <i class="fas fa-circle-check" v-on:click="create()"></i>
                        <h1>@{{ diary.title }}</h1>
                        <p1><b>The reason?</b> : @{{ diary.reason }}</p1>
                        <pen><i class="fa-solid fa-circle-xmark" v-on:click="clear()" ></i></pen>
                        <p>@{{ diary.content }}</p>
                        <p1> <b> Ques? : </b> @{{ diary.ask }}</p1>
                        <h4>-@{{ diary.name_writer }}-</h4>
                    </div>
                </div>
            </div>


            <div class="row">
                <template v-for="(value, key) in myDiary">
                    <div class='post-it'>
                        <i class="fa fa-trash" v-on:click="deleteaNote(value.id)"></i>
                        <h1>@{{ value.title }}</h1>
                        <h5> -@{{ formatDate(value.created_at) }}-</h5>
                        <p1><b>The reason?</b>  @{{ value.reason }}</p1>
                        <pen><i class="fas fa-pencil"></i></pen>
                        <p> @{{ value.content }}</p>
                        <p1> <b> Ques? : </b> @{{ value.ask }}</p1>
                        <h4>-@{{ value.name_writer }}-</h4>
                    </div>
                </template>
            </div>
        </div>
    </div>


</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/NoteAPP/noteAppBE/noteApp.js"></script>
@jquery
@toastr_js
@toastr_render

</html>
