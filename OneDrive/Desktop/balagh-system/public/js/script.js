

        const navbar =
            document.getElementById("navbar");


        window.addEventListener("scroll", function () {

            if (window.scrollY > 30) {

                navbar.classList.add("scrolled");

            } else {

                navbar.classList.remove("scrolled");

            }

        });


        const mobileMenu =
            document.querySelector(".mobile-menu");


        const navLinks =
            document.querySelector(".nav-links");


        mobileMenu.addEventListener("click", function () {

            if (navLinks.style.display === "flex") {

                navLinks.style.display = "none";

            } else {

                navLinks.style.display = "flex";

                navLinks.style.position = "absolute";

                navLinks.style.top = "75px";

                navLinks.style.right = "5%";

                navLinks.style.left = "5%";

                navLinks.style.flexDirection = "column";

                navLinks.style.padding = "20px";

                navLinks.style.borderRadius = "18px";

                navLinks.style.background =
                    "rgba(10,15,28,0.96)";

                navLinks.style.border =
                    "1px solid rgba(255,255,255,0.1)";

                navLinks.style.backdropFilter =
                    "blur(20px)";

            }

        });


        /* Simple number animation */

        const counters =
            document.querySelectorAll(".stat-number");


        const observer =
            new IntersectionObserver(

                entries => {

                    entries.forEach(entry => {

                        if (entry.isIntersecting) {

                            entry.target.style.transform =
                                "scale(1.05)";

                            setTimeout(() => {

                                entry.target.style.transform =
                                    "scale(1)";

                            }, 250);

                        }

                    });

                },

                {
                    threshold: 0.6
                }

            );


        counters.forEach(counter => {

            observer.observe(counter);

        });

    