document.addEventListener("DOMContentLoaded", function(event) {
   document.querySelector(".header__wrapper__item__circle").addEventListener("click", () => {
       for (let i = 0; i <= 3; i++) {
         document
           .getElementsByClassName("header__wrapper__nav-items")
           [i].classList.remove("show-menu");
         document
           .getElementsByClassName("header__wrapper__box__box-line")
           [i].classList.remove("box-line-show");
       }
       document.querySelector(".header__wrapper__box").classList.remove("box-show");
       document.querySelector(".menu-add").classList.toggle("go");
       document.querySelector(".header__wrapper__item__search").classList.toggle("search-focus");
       document.querySelector(".header__wrapper__item__search").focus();
       document.querySelector(".header__wrapper__item__circle").classList.toggle("color");
       document.querySelector(".line1").classList.toggle("move");
       document.querySelector(".line2").classList.toggle("mov");
       document.querySelector(".header__effect").classList.toggle("big");

       handleShowMenu()
   });
   /* menu */
    document.querySelector(".header__wrapper__item.menu").addEventListener("click", () => {
        for (let i = 0; i <= 3; i++) {
        document.querySelector(".header__wrapper__box").classList.remove("box-show");
        document
        .getElementsByClassName("header__wrapper__nav-items")
        [i].classList.toggle("show-menu");
        document
        .getElementsByClassName("header__wrapper__box__box-line")
        [i].classList.remove("box-line-show");
        }

        handleShowMenu()
    });
   /* box */
    document.querySelector(".header__wrapper__gallery").addEventListener("click", () => {
        document.querySelector(".header__wrapper__box").classList.toggle("box-show");
        for (let i = 0; i <= 3; i++) {
            document
            .getElementsByClassName("header__wrapper__box__box-line")
            [i].classList.toggle("box-line-show");
            document
            .getElementsByClassName("header__wrapper__nav-items")
            [i].classList.remove("show-menu");
        }

        handleShowMenu()
    });

    function handleShowMenu() {
        let isToggler = document
                            .getElementsByClassName("header__wrapper__nav-items")
                            [0].classList.contains('show-menu')

            console.log(isToggler)
            document
                .getElementsByClassName("header__wrapper")
                [0].classList.toggle("is-open", isToggler);
    }
});

