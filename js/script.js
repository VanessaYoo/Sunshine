//nav link active
const navLink = document.querySelectorAll(".link");
navLink.forEach((navLink) => {
  navLink.addEventListener("click", () => {
    document.querySelector(".active")?.classList.remove("active");
    navLink.classList.add("active");
  });
});

//toggle active
const navToggleLink = document.querySelectorAll(".fa-bars");
navToggleLink.forEach((navToggleLink) => {
  navToggleLink.addEventListener("click", () => {
    document.querySelector(".active")?.classList.remove("active");
    navToggleLink.classList.add("active");
  });
});

//membuka toggle dan menampilkan link
let navToggle = document.getElementById("toggle");
navToggle.style.maxHeight = "0px";
function toggleNav() {
  if (navToggle.style.maxHeight == "0px") {
    navToggle.style.maxHeight = "300px";
  } else {
    navToggle.style.maxHeight = "0px";
  }
}
//menutup toggle jika link telah diclick
navLink.forEach((link) => {
  link.addEventListener("click", () => {
    navToggle.style.maxHeight = "0px";
  });
});

//scroll section halaman = nav active
let sections = document.querySelectorAll("section[data-group]"); //ambil section yang memiliki data-group

function scrollActive() {
  let getLink = false; //belum ada link yang didapatkan = false
  let currentYScroll = window.scrollY; //scroll

  sections.forEach((section) => {
    let sectionHeight = section.offsetHeight; //tinggi setiap section
    let sectionTop = section.offsetTop - 100; //supaya aktif meskipun section belum sampai di paling atas (langsung aktif saat muncul)

    if (
      //masuk section
      currentYScroll > sectionTop && //section masuk (masuk sedikit sudah termasuk)
      currentYScroll <= sectionTop + sectionHeight //masih didalam section
    ) {
      getLink = true; //mendapatkan link
      currentSection = section; //section tersebut adalah section saat ini

      // hapus active navLink sebelumnya
      document
        .querySelectorAll(".middle-nav a")
        .forEach((beforeNavLink) => beforeNavLink.classList.remove("active"));

      //tambah active navLink saat ini
      let group = currentSection.getAttribute("data-group"); //ambil data-group
      let currentNavLink = document.querySelector(
        `.middle-nav a[href*="${group}"]`,
      ); //data-group di masukkan ke navLink saat ini (sebagai pegganti id section)
      currentNavLink?.classList.add("active"); //tambah class active
    }
  });

  if (!getLink) {
    //jika tidak mendapatkan link, maka active dihapus
    document
      .querySelectorAll(".middle-nav a")
      .forEach((link) => link.classList.remove("active"));
  }
}

//nav hide
let naik = window.pageYOffset;
window.addEventListener("scroll", () => {
  let turun = window.pageYOffset; //scroll saat ini
  if (turun > naik) {
    //kalau scrollnya turun lagi aktif, dinaikkan
    document.querySelector("header").style.top = "-200px";
  } else {
    document.querySelector("header").style.top = "0px";
  }
  naik = turun; //refresh lagi biar nilai sama sama -> tidak ada turun > naik atau sebaliknya

  scrollActive();
});

//program
window.addEventListener("load", () => {
  new Swiper(".wrap-program", {
    loop: true,
    spaceBetween: 30,

    navigation: {
      nextEl: ".right-arrow",
      prevEl: ".left-arrow",
    },

    breakpoints: {
      0: { slidesPerView: 1 },
      768: { slidesPerView: 2 },
      1024: { slidesPerView: 3 },
    },
  });
});

let misiBox = document.querySelector(".misi-box");
let container = document.querySelector(".container-misi");

let dragging = false,
  mouseLocation,
  misiBoxLocation;

//saat drag
const dragStart = (e) => {
  dragging = true;
  mouseLocation = e.pageX;
  misiBoxLocation = container.scrollLeft;
};

//drag active
const dragActive = (e) => {
  if (!dragging) return;

  let offset = e.pageX - mouseLocation;
  container.scrollLeft = misiBoxLocation - offset;
};

//berhenti drag
const dragStop = (e) => {
  dragging = false;
  mouseLocation = e.pageX;
  misiBoxLocation = container.scrollLeft;
};

misiBox.addEventListener("mousedown", dragStart);
misiBox.addEventListener("mousemove", dragActive);
misiBox.addEventListener("mouseup", dragStop);
misiBox.addEventListener("mouseleave", dragStop);
