


function sendForm () {
  //ckeditor data from here
  let ckContent = editor.getData();
  /* console.log(data); */

    /* var output = document.getElementById('output'); */
    var hasFile = false;
    var progress = document.getElementById('progress');
    progress.value = 0;
    var percent = document.getElementById('percent');
    percent.innerHTML = 0 + '%';

    var notice = document.getElementById('notice');
    //let content = document.getElementById('content');
    let title = document.getElementById('title');
    var data = new FormData();
    //replace with ckeditor 
    data.append('content', ckContent);

    data.append('title', title.value);
    if(document.getElementById('file').files.length > 0){
        data.append('image', document.getElementById('file').files[0]);
        hasFile = true;
    }
    var config = {
      onUploadProgress: function(progressEvent) {
        var percentCompleted = Math.round( (progressEvent.loaded * 95) / progressEvent.total );
        progress.value = hasFile ? percentCompleted : 0;
        percent.innerHTML = hasFile ? percentCompleted + '%' : 0 + '%';
      },
      Headers: {
        'content-type': 'multipart/form-data'
      }
    };
var redirectUrl = '';
    axios.post('/blogPost/Post', data, config)
      .then(function (res) {
       /*  notice.style.display = "block";
        notice.classList.remove('alert-danger');
        notice.classList.add('alert-success'); */
        /* notice.innerHTML = res.data; */
        redirectUrl = res.data;
        progress.value = hasFile ? 100 : 0;
        percent.innerHTML = hasFile ? 100 + '%' : 0 + '%';
        console.log(res);
        window.location = redirectUrl;
      })
      .catch(function (err) {
       /*  notice.classList.remove('alert-success');
        notice.classList.add('alert-danger');
        notice.style.display = "block"; */
        alert(JSON.stringify(err, null, 4));
        let title_err = document.getElementById('title_err');
        let content_err = document.getElementById('content_err');

        let msg = err.response.data.errors;
        console.log(err.response);
       if(msg.title !== undefined){
         title_err.innerHTML = msg.title;
       }
       console.log('title:' + msg.title );
       if(msg.content !== undefined){
         content_err.innerHTML += msg.content;
       }
      
       /*  output.className = 'container text-danger';
        output.innerHTML = err.message; */
       
      })
      .then(function (){
        $("#notice").delay(5000).fadeOut();
      });

      
  }