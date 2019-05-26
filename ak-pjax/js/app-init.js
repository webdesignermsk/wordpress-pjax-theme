/*Dont touch*/
/*=========================================================*/
var $ = jQuery;
var func = [];

Barba.Pjax.Dom.wrapperId = "app-wrapper";
Barba.Pjax.Dom.containerClass = "app-container";
Barba.Pjax.ignoreClassLink = "ignore-link";



  var AppTransition = Barba.BaseTransition.extend({
      start: function() {
          Promise
              .all([this.newContainerLoading, this.hidePage()])
              .then(this.showPage.bind(this));
      },
      hidePage: function() {
          var deferred = Barba.Utils.deferred();
          onPageLeave();
          setTimeout(function(){
            window.scrollTo(0, 0);
            deferred.resolve();
          },500);
          return deferred.promise;
      },
      showPage: function() {
          this.done();
          onPageEnter();
      }
  });

Barba.Pjax.getTransition = function() {
    return AppTransition;
};

Barba.Pjax.start();

/*=========================================================*/

//on page leave function
function onPageLeave(){
  onLeaveInit();
}
//on page enter function
function onPageEnter(){
  onEnterInit();
}

function onEnterInit(){
  $(window).scrollTop(0);
  let name = $('#app-container').data('namespace');
  console.log(name);
  $('body').removeClass("loading");
  if(name){
    $('body').addClass("ak-"+name);
    for (var i=0 ; i<func.length ; i++) {
      if(name == func[i].name){
        func[i].onEnter();
      }
    }
  }
}
function onLeaveInit(){
  let name = $('#app-container').data('namespace');
  $('body').addClass("loading");
  $('body').removeClass("ak-"+name);
  if(name){
    for (var i=0 ; i<func.length ; i++) {
      if(name == func[i].name){
        func[i].onLeave();
      }
    }
  }
}


/*=============VIEWS==============*/

/*custom views*/
var example = {
  name : 'example',
  onEnter : function(){
    console.log('example enter');
  },
  onLeave : function(){
    console.log('example leave');
  }
};
func.push(example);

var home = {
  name : 'home',
  onEnter : function(){
    console.log('home enter');
  },
  onLeave : function(){
    console.log('home leave');
  }
};
func.push(home);
/*end of custom views*/

