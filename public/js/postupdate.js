function sendForm ($post_id) {
    /* var output = document.getElementById('output'); */

    //postupdate ckeditor
    let ckContent = editor.getData();

    var hasFile = false;
    var progress = document.getElementById('progress');
    progress.value = 0;
    var percent = document.getElementById('percent');
    percent.innerHTML = 0 + '%';

    var notice = document.getElementById('notice');
    let content = document.getElementById('content');
    let title = document.getElementById('title');
    var data = new FormData();
    
    data.append('content', ckContent);
    data.append('title', title.value);
    data.append('_method', 'PUT');
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

    axios.post('/blogPost/Post/' + $post_id, data, config)
      .then(function (res) {
        notice.style.display = "block";
        notice.classList.remove('alert-danger');
        notice.classList.add('alert-success');
        notice.innerHTML = res.data;
        progress.value = hasFile ? 100 : 0;
        percent.innerHTML = hasFile ? 100 + '%' : 0 + '%';
        console.log(res);
      })
      .catch(function (err) {
        notice.classList.remove('alert-success');
        notice.classList.add('alert-danger');
        notice.style.display = "block";
        notice.innerHTML = err.response.data;
       /*  output.className = 'container text-danger';
        output.innerHTML = err.message; */
      })
      .then(function (){
        $("#notice").delay(5000).fadeOut();
      });
  }