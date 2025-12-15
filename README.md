<div align="center">
  <img src="https://readme-typing-svg.herokuapp.com?font=Fira+Code&weight=600&size=28&duration=3000&pause=1000&color=006A4E&center=true&vCenter=true&width=500&lines=YMP+Sumbar+Official+Theme;Membangun+Umat%2C+Menebar+Manfaat;WordPress+Custom+Development" alt="Typing SVG" />
  
  <br>
  
  <img src="https://img.shields.io/badge/WordPress-Theme-21759B?style=for-the-badge&logo=wordpress&logoColor=white" alt="WordPress">
  <img src="https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white">
  <img src="https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php&logoColor=white">
  <img src="https://img.shields.io/badge/ACF-PRO-00E4BC?style=for-the-badge&logo=adguard&logoColor=white">
</div>
<br>

<p align="center">
  Tema WordPress kustom (Custom Theme) yang dikembangkan khusus untuk <b>Yayasan Mubaligh Profesional Sumatera Barat (YMP Sumbar)</b>.<br>
  Dibangun dengan pendekatan <i>clean code</i>, terintegrasi penuh dengan Bootstrap 5, dan manajemen konten dinamis via ACF.
</p>

---

## 📸 Demo Preview

<div align="center">
  <img src="screenshot.png" alt="Website Preview" width="100%" style="border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
</div>

<br>

## 🚀 Fitur Unggulan

* ✨ **Desain Responsif & Modern:** Tampilan optimal di semua device menggunakan **Bootstrap 5**.
* 📝 **Dynamic Content Management:** Semua teks, gambar, dan link (Hero, Program, Galeri) dapat diedit via Admin Panel (ACF).
* 📰 **Sistem Portal Berita:** Layout arsip berita grid dan *Single Post* yang rapi & *readable*.
* 📲 **Smart WhatsApp Link:** Fitur `preg_replace` otomatis yang membersihkan nomor HP admin, memastikan link WA selalu valid.
* 🖼️ **Galeri Interaktif:** Pop-up modal Bootstrap untuk detail program dan dokumentasi foto.

## 🛠️ Tech Stack

| Komponen | Teknologi |
| :--- | :--- |
| **CMS Core** | WordPress |
| **Frontend** | HTML5, CSS3, Bootstrap 5.3 |
| **Backend** | PHP Native (WordPress Codex) |
| **Database** | MySQL |
| **Plugins** | Advanced Custom Fields (ACF) |

## 📂 Struktur Direktori

```text
ymp-sumbar-theme/
├── assets/
│   ├── css/          # Custom Styles (style.css, index.css, artikel.css)
│   └── images/       # Static Assets
├── footer.php        # Component: Footer
├── front-page.php    # Page: Halaman Utama (Landing Page)
├── functions.php     # Core: Theme Logic & Enqueue Scripts
├── header.php        # Component: Navbar & Header
├── index.php         # Page: Arsip Berita
├── page-*.php        # Page: Template Halaman Khusus
├── single.php        # Page: Detail Artikel Berita
└── style.css         # Metadata Tema