$(document).ready(function(){
// nasa api
$.ajax({
  url:"https://api.nasa.gov/planetary/apod?api_key=MZr66vwBr80PH8jNuVXZCwXLKl1bVkMuQEVgdUyU",
  success:function(info){
      document.getElementById("title").innerHTML=info.title;
      document.getElementById("image").innerHTML= "<img src='" + info.url + "'/>";
      document.getElementById("explanation").innerHTML=info.explanation;
      document.getElementById("copyright").innerHTML="By "+info.copyright;
  }
});

//show list of old blog button
$('.bloglist_section').hide();

  $('#oldblogs').on('click', function(){
    $('.bloglist_section').toggle();
  });

//learn more button
$('.nasainfo').hide();

  $('#moreinfo').on('click', function(){
    $('.nasainfo').toggle();
  });


});