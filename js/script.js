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

//membuka toggle dan menampilkan link (index.php)
let navToggle = document.getElementById("toggle");
if (navToggle) {
  navToggle.style.maxHeight = "0px";
}
function toggleNav() {
  if (navToggle.style.maxHeight == "0px") {
    navToggle.style.maxHeight = "320px";
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

// untuk (user-sidebar.php)
let sidebarToggle = document.getElementById("toggle-sidebar");
let iconBars = document.querySelector(".icon-nav.user i");
if (sidebarToggle && window.innerWidth <= 750) {
  sidebarToggle.style.maxHeight = "0px";
}
function toggleSidebar() {
  if (sidebarToggle && window.innerWidth <= 750) {
     let tutupDropDown = sidebarToggle.style.maxHeight === "0px";
    sidebarToggle.style.maxHeight = tutupDropDown ? "320px" : "0px";
    
    // terbuka jadi oren, ditutup jadi hitam
    iconBars.style.setProperty("color", tutupDropDown ? "#ff6a00" : "black", "important");
  }
}
const sidebarLinks = document.querySelectorAll(".sidebar .menu a");
sidebarLinks.forEach((link) => {
  link.addEventListener("click", () => {
    if (sidebarToggle && window.innerWidth <= 750) {
      sidebarToggle.style.maxHeight = "0px";
            if(iconBars) iconBars.style.color = "black";
    }
  });
});

// untuk (admin-sidebar.php)
  const sidebarAdmin = document.querySelector(".sidebar.admin");
  const barAdmin = document.querySelector(".icon-nav.admin");
  const iconAdmin = document.querySelector(".icon-nav.admin i");
function toggleSidebarAdmin() {

  if (sidebarAdmin && window.innerWidth <= 750) {
    sidebarAdmin.classList.toggle("buka-admin");
    barAdmin.classList.toggle("geser-kanan");
    
    if (barAdmin.classList.contains("geser-kanan")) {
      iconAdmin.classList.replace("fa-bars", "fa-xmark");
    } else {
      iconAdmin.classList.replace("fa-xmark", "fa-bars");
    }
    
  }
}
document.querySelectorAll(".sidebar.admin .menu a").forEach(link => {
  link.addEventListener("click", () => {
    
    if (sidebarAdmin && window.innerWidth <= 750) {
      sidebarAdmin.classList.remove("buka-admin");
      if (barAdmin) barAdmin.classList.remove("geser-kanan");
      if (iconAdmin) iconAdmin.classList.replace("fa-xmark", "fa-bars"); 
    }
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

//pilih metode pembayaran
function pilihMetode(metode) {
    const btnTunai = document.querySelector('.btn.tunai');
    const btnTransfer = document.querySelector('.btn.transfer');
    const isiTunai = document.getElementById('isi-tunai');
    const isiTransfer = document.getElementById('isi-transfer');
    const inputBukti = document.getElementById('input-bukti');

    if (metode === 'tunai') {
        btnTunai.classList.add('active');
        btnTransfer.classList.remove('active');
        
        isiTunai.style.display = 'block';
        isiTransfer.style.display = 'none';
        
        if(inputBukti) inputBukti.required = false;
        
    } else if (metode === 'transfer') {
        btnTransfer.classList.add('active');
        btnTunai.classList.remove('active');
        
        isiTunai.style.display = 'none';
        isiTransfer.style.display = 'grid'; 
        
        if(inputBukti) inputBukti.required = true;
    }
}

