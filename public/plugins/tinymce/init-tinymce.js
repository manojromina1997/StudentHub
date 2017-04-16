tinymce.init({
    //will replace textarea having tinymce class.
   selector:"textarea.tinymce",



   width:"100%" ,
   height:250,

  color_picker_callback: function(callback, value) {
    callback('#FF00FF');
  } ,

 statusbar:true,

 plugins:[
     "advlist autolink link image imagetools lists charmap print preview hr anchor pagebreak",
     "searchreplace wordcount visualblocks visualchars  fullscreen insertdatetime media nonbreaking",
     "save table contextmenu directionality emoticons template paste textcolor codesample spellchecker "
 ],


menu:{
    view:{title:'Edit', items: 'cut,copy,paste',
 
}
   
},

  toolbar: [
    'alignleft aligncenter alignright | undo redo | styleselect | bold italic | link image media| codesample | bullist numlist | preview media | forecolor backcolor emoticons | searchreplace | imageupload' ,
    
   
  ],
/*
 relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
    */
 setup: function(editor) {
            var inp = $('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
            $(editor.getElement()).parent().append(inp);

            inp.on("change",function(){
                var input = inp.get(0);
                var file = input.files[0];
                var fr = new FileReader();
                fr.onload = function() {
                    var img = new Image();
                    img.src = fr.result;
                    editor.insertContent('<img src="'+img.src+'"/>');
                    inp.val('');
                }
                fr.readAsDataURL(file);
            });

            editor.addButton( 'imageupload', {
                text:"IMAGE",
                icon: false,
                onclick: function(e) {
                    inp.trigger('click');
                }
            });
        }
});
