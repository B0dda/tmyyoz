class Swipe {
  constructor(element) {
    this.xDown = null;
    this.yDown = null;
    this.element = typeof(element) === 'string' ? document.querySelector(element) : element;
    if (!this.element) {
      return;
    }
    this.element.addEventListener('touchstart', function(evt) {
      this.xDown = evt.touches[0].clientX;
      this.yDown = evt.touches[0].clientY;
    }.bind(this), false);

    this.element.addEventListener('mousedown', function(evt) {
      this.xDown = evt.offsetX;
      this.yDown = evt.offsetY;
    }.bind(this), false);

  }

  onLeft(callback) {
    this.onLeft = callback;
    return this;
  }

  onRight(callback) {
    this.onRight = callback;
    return this;
  }

  onUp(callback) {
    this.onUp = callback;
    return this;
  }

  onDown(callback) {
    this.onDown = callback;
    return this;
  }

  handleTouchMove(evt) {
    if (!this.xDown || !this.yDown) {
      return;
    }

    var xUp = evt.touches[0].clientX;
    var yUp = evt.touches[0].clientY;

    this.xDiff = this.xDown - xUp;
    this.yDiff = this.yDown - yUp;

    if (Math.abs(this.xDiff) > Math.abs(this.yDiff)) { // Most significant.
      if (this.xDiff > 0) {
        this.onLeft();
      } else {
        this.onRight();
      }
    } else {
      if (this.yDiff > 0) {
        this.onUp();
      } else {
        this.onDown();
      }
    }

    // Reset values.
    this.xDown = null;
    this.yDown = null;
  }
  handleTouchMove(evt) {
    if (!this.xDown || !this.yDown) {
      return;
    }

    var xUp = (evt.touches) ? evt.touches[0].clientX : evt.offsetX;
    var yUp = (evt.touches) ? evt.touches[0].clientY : evt.offsetY;

    this.xDiff = this.xDown - xUp;
    this.yDiff = this.yDown - yUp;

    if (Math.abs(this.xDiff) > Math.abs(this.yDiff)) { // Most significant.
      if (this.xDiff > 0) {
        this.onLeft();
      } else {
        this.onRight();
      }
    } else {
      if (this.yDiff > 0) {
        this.onUp();
      } else {
        this.onDown();
      }
    }

    // Reset values.
    this.xDown = null;
    this.yDown = null;
  }
  run() {
    if (!this.element) {
      return;
    }
    this.element.addEventListener('touchmove', function(evt) {
      this.handleTouchMove(evt);
    }.bind(this), false);
    this.element.addEventListener('mousemove', function(evt) {
      this.handleTouchMove(evt);
    }.bind(this), false);
  }
}

// Slider START
var slides = document.getElementsByClassName('slide');
var rightButton = document.getElementById('right');
var leftButton = document.getElementById('left');
var slidePosition = 2;

function animateValue(obj, start = 0, end = null, duration = 2200) {
  if (obj) {
    var textStarting = obj.innerHTML;
    end = end || parseInt(textStarting.replace(/\D/g, ""));
    var range = end - start;
    var minTimer = 50;
    var stepTime = Math.abs(Math.floor(duration / range));
    stepTime = Math.max(stepTime, minTimer);
    var startTime = new Date().getTime();
    var endTime = startTime + duration;
    var timer;

    function run() {
      var now = new Date().getTime();
      var remaining = Math.max((endTime - now) / duration, 0);
      var value = Math.round(end - (remaining * range));
      obj.innerHTML = textStarting.replace(/([0-9]+)/g, value);
      if (value == end) {
        clearInterval(timer);
      }
    }
    timer = setInterval(run, stepTime);
    run();
  }
}

function slide(e, m = 1) {
  var el = e[slidePosition].getElementsByClassName('v')[0];
  var min_number = el.getAttribute('data-min');
  var max_number = el.getAttribute('data-max');
  animateValue(el, max_number, min_number);
  if (slidePosition <= 1 && m == -1) {
    e[slidePosition].classList.remove('selected');
    for (let i = 0; i < e.length; i++) {
      e[i].classList.add('hidden');
    }
    slidePosition = e.length - 2;
    e[slidePosition].classList.add('selected');
    e[slidePosition].classList.remove('hidden');
    e[slidePosition + (1 * m)].classList.remove('hidden');
    e[slidePosition - (1 * m)].classList.remove('hidden');
  } else if (slidePosition < (e.length - 2)) {
    e[slidePosition - (1 * m)].classList.add('hidden');
    if (e[slidePosition + (2 * m)])
      e[slidePosition + (2 * m)].classList.remove('hidden');
    e[slidePosition + (1 * m)].classList.add('selected');
    e[slidePosition].classList.remove('selected');
    slidePosition += m;
  } else if (slidePosition < (e.length - 1) && m == 1) {
    e[slidePosition].classList.remove('selected');
    for (let i = 0; i < e.length; i++) {
      e[i].classList.add('hidden');
    }
    slidePosition = 1;
    e[slidePosition].classList.add('selected');
    e[slidePosition].classList.remove('hidden');
    e[slidePosition + (1 * m)].classList.remove('hidden');
    e[slidePosition - (1 * m)].classList.remove('hidden');
  } else if (m == -1) {
    e[slidePosition - (1 * m)].classList.add('hidden');
    if (e[slidePosition + (2 * m)])
      e[slidePosition + (2 * m)].classList.remove('hidden');
    e[slidePosition + (1 * m)].classList.add('selected');
    e[slidePosition].classList.remove('selected');
    slidePosition += m;
  }

  var el = e[slidePosition].getElementsByClassName('v')[0];
  var min_number = el.getAttribute('data-min');
  var max_number = el.getAttribute('data-max');
  animateValue(el, min_number, max_number);
}
if (rightButton)
  rightButton.addEventListener('click', function() {
    slide(slides, -1);
  });
if (leftButton)
  leftButton.addEventListener('click', function() {
    slide(slides, 1);
  });
var swiper = new Swipe('#opinion-slider');
swiper.onLeft(function() {
  slide(slides, -1);
});
swiper.onRight(function() {
  slide(slides, 1);
});
swiper.onUp(function() {});
swiper.onDown(function() {});
swiper.run();

// Slider END

// Typewriter effect START
document.addEventListener('DOMContentLoaded', function(event) {
  var dataText = ["إدارة أعمال", "طب", "هندسة برمجيات", "فنون جميلة"];

  function typeWriter(text, i, fnCallback) {
    if (i < (text.length)) {
      document.querySelector("#typer").innerHTML = text.substring(0, i + 1) + '<span aria-hidden="true" class="typer-line"></span>';
      setTimeout(function() {
        typeWriter(text, i + 1, fnCallback)
      }, 100);
    } else if (typeof fnCallback == 'function') {
      setTimeout(fnCallback, 900);
    }
  }

  function StartTextAnimation(i) {
    if (typeof dataText[i] == 'undefined') {
      setTimeout(function() {
        StartTextAnimation(0);
      }, 100);
    } else if (i < dataText[i].length) {
      typeWriter(dataText[i], 0, function() {
        StartTextAnimation(i + 1);
      });
    }
  }
  StartTextAnimation(0);
});
// Typewriter effect END

//Iphone SLider START
var iphone_slider = document.getElementById('iphone-slider');
if (iphone_slider) {
  var iphone_slides = iphone_slider.getElementsByClassName('item');
  var iphone_slider_nav = document.getElementById('iphone-slider-nav');
  var iphone_slider_buttons = iphone_slider_nav.getElementsByClassName('item');
  var iphone_current_slide = 1;
  var slider_place = document.getElementById('slider-place');

  var intrvl = setInterval(function() {
    slide_iphone(iphone_current_slide, 1);
  }, 5000);



  function slide_iphone(slideNumber, m = 1) {
    clearInterval(intrvl);
    intrvl = setInterval(function() {
      slide_iphone(iphone_current_slide, 1);
    }, 5000);
    slideNumber += m;
    iphone_current_slide = slideNumber;
    if (slideNumber > iphone_slides.length) {
      iphone_current_slide = 1;
      slide_iphone(iphone_current_slide, 0);
      return;
    } else if (slideNumber < 1) {
      iphone_current_slide = iphone_slides.length;
      slide_iphone(iphone_current_slide, 0);
      return;
    }
    iphone_slider.style.left = (slideNumber - 1) * 100 + "%";
    for (let j = 0; j < iphone_slider_buttons.length; j++) {
      iphone_slider_buttons[j].classList.remove('selected');
      slider_place.getElementsByClassName('item')[j].classList.remove('selected');
    }
    slider_place.getElementsByClassName('item')[slideNumber - 1].classList.add('selected');
    iphone_slider_buttons[slideNumber - 1].classList.add('selected');
  }

  for (let i = 0; i < iphone_slider_buttons.length; i++) {
    iphone_slider_buttons[i].getElementsByClassName('number')[0]
      .addEventListener('click', function() {
        slide_iphone(parseInt(this.innerText), 0);

      });
  }
}
var scrollPos = 0;

function detectMob() {
  return (window.innerWidth <= 1000);
}
var checkI = true;

// window.addEventListener("scroll", function(e) {
//   if (checkI && !detectMob()) {
//     var scroll = document.getElementById('section-4').getBoundingClientRect().top - (window.innerHeight - iphone_slider_nav.clientHeight) / 2;
//     if (scroll < 600 && scroll > -600) {
//       if (scroll < -400) {
//         document.getElementById('section-4').style.transform = "translateY(" + 400 + "px)";
//       } else if (scroll < 0) {
//         document.getElementById('section-4').style.transform = "translateY(" + (-scroll / 1.2) + "px)";
//       } else if (scroll > 0) {
//         document.getElementById('section-4').style.transform = "translateY(" + 0 + "px)";
//       }
//       if (scroll > -450 && (document.body.getBoundingClientRect()).top > scrollPos && iphone_current_slide != 1) {
//         checkI = false;
//         slide_iphone(iphone_current_slide, -1);
//         setTimeout(function() {
//           checkI = true;
//         }, 200);
//       } else if (scroll < -50 && iphone_current_slide != 3 && (document.body.getBoundingClientRect()).top < scrollPos) {
//         checkI = false;
//         slide_iphone(iphone_current_slide, 1);
//         setTimeout(function() {
//           checkI = true;
//         }, 200);
//       }
//     }
//     scrollPos = (document.body.getBoundingClientRect()).top;
//   }
//
// });
var iphone_swiper = new Swipe('#iphone-slider');
iphone_swiper.onLeft(function() {
  slide_iphone(iphone_current_slide, -1);
});
iphone_swiper.onUp(function() {});
iphone_swiper.onDown(function() {});
iphone_swiper.onRight(function() {
  slide_iphone(iphone_current_slide, 1);
});

iphone_swiper.run();
//Iphone Slider END

//Header START
var x;
window.addEventListener("scroll", function(e) {
  clearTimeout(x);
  if (window.scrollY > 500) {
    document.getElementById('header').classList.add('sticky');
    x = setTimeout(function() {
      document.getElementById('header').style.top = "0";
      document.getElementById('header').style.position = "fixed";
    }, 300);
  } else if (window.scrollY <= 400) {
    document.getElementById('header').style.top = "";
    x = setTimeout(function() {
      document.getElementById('header').style.position = "absolute";
      document.getElementById('header').style.top = "";
      document.getElementById('header').classList.remove('sticky');
    }, 100);
  }
});
//Header END

//Mobile Menu START
document.getElementById('menu-button').addEventListener('click', function() {
  if (this.parentElement.classList.contains('opened')) {
    this.parentElement.classList.remove('opened');
  } else {
    this.parentElement.classList.add('opened');
  }
});
//Mobile Menu END

//FAQ START
var faq = document.getElementsByClassName('faq-container')[0];
if (faq) {
  var questions = faq.getElementsByClassName('item');
  for (let i = 0; i < questions.length; i++) {
    questions[i].getElementsByClassName('button')[0]
      .addEventListener('click', function() {
        if (this.parentElement.classList.contains('selected')) {
          this.parentElement.classList.remove('selected')
        } else {
          for (let j = 0; j < questions.length; j++) {
            questions[j].classList.remove('selected');
          }
          this.parentElement.classList.add('selected')
        }
      });
  }
}
//FAQ END

//Smooth Scroll START
function scrollTo(element) {
  window.scroll({
    behavior: 'smooth',
    left: 0,
    top: element.offsetTop - 100
  });
}

var anchors = document.getElementsByTagName('a');

for (var i = 0; i < anchors.length; i++) {
  anchors[i].addEventListener('click', function(e) {
    var a = this.getAttribute('href');
    console.log(a);
    if (a[0] == "#") {
      e.preventDefault();
      a = a.replace("#", "");
      scrollTo(document.getElementById(a));
      document.getElementById('menu-button').parentElement.classList.remove('opened');
    }
  });
}
//Smooth Scroll END