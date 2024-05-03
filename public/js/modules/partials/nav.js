const mobileMenuButton = document.querySelector(
  '[aria-controls="mobile-menu"]'
);

function toggleMobileMenu() {
  const isExpanded = mobileMenuButton.ariaExpanded;
  // console.log(mobileMenuButton.ariaExpanded);

  const mobileMenu = document.getElementById("mobile-menu");
  const openMobileMenuBtn = mobileMenuButton.querySelector(
    "#open-mobile-menu-btn"
  );
  const closeMobileMenuBtn = mobileMenuButton.querySelector(
    "#close-mobile-menu-btn"
  );

  if (isExpanded == "false") {
    mobileMenu.classList.remove("md:hidden");
    mobileMenu.classList.add("hidden");

    openMobileMenuBtn.classList.remove("hidden");
    openMobileMenuBtn.classList.add("block");

    closeMobileMenuBtn.classList.remove("block");
    closeMobileMenuBtn.classList.add("hidden");
  } else if (isExpanded == "true") {
    mobileMenu.classList.remove("hidden");
    mobileMenu.classList.add("md:hidden");

    openMobileMenuBtn.classList.remove("block");
    openMobileMenuBtn.classList.add("hidden");

    closeMobileMenuBtn.classList.remove("hidden");
    closeMobileMenuBtn.classList.add("block");
  }

  mobileMenuButton.ariaExpanded = isExpanded == "true" ? "false" : "true";
}

if (mobileMenuButton) {
  mobileMenuButton.addEventListener("click", toggleMobileMenu);
}
