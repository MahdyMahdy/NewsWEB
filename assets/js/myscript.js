//according to loftblog tut
$('.nav li:first').addClass('active');

var showSection = function showSection(section, isAnimate) {
  var
  direction = section.replace(/#/, ''),
  reqSection = $('.section').filter('[data-section="' + direction + '"]'),
  reqSectionPos = reqSection.offset().top - 0;

  if (isAnimate) {
    $('body, html').animate({
      scrollTop: reqSectionPos },
    800);
  } else {
    $('body, html').scrollTop(reqSectionPos);
  }

};

var checkSection = function checkSection() {
  $('.section').each(function () {
    var
    $this = $(this),
    topEdge = $this.offset().top - 80,
    bottomEdge = topEdge + $this.height(),
    wScroll = $(window).scrollTop();
    if (topEdge < wScroll && bottomEdge > wScroll) {
      var
      currentId = $this.data('section'),
      reqLink = $('a').filter('[href*=\\#' + currentId + ']');
      reqLink.closest('li').addClass('active').
      siblings().removeClass('active');
    }
  });
};

$('.main-menu, .scroll-to-section').on('click', 'a', function (e) {
  if($(e.target).hasClass('external')) {
    return;
  }
  e.preventDefault();
  $('#menu').removeClass('active');
  showSection($(this).attr('href'), true);
});

$(window).scroll(function () {
  checkSection();
});

document.addEventListener('click', function(e) {
if(e.target.id[0]=='s' && e.target.id[1]=='t' && e.target.id[2]=='a' && e.target.id[3]=='r')
{
var id=parseInt(e.target.id[4]);
document.getElementById("hiddenrate").value=id+1;
if(document.getElementById("star"+id).style.color=="blue") {
    for(var i=id+1;i<=9;i++)
    {
        document.getElementById("star"+i).style.color="gray";
    }
}
else
{
    for(var i=0;i<=id;i++)
    {
        document.getElementById("star"+i).style.color="blue";
    }
}
}

}, false);