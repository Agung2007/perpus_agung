<?php
include '../koneksi.php';

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Projek Jagung</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
    <!-- Vector CSS -->
    <link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Plugins -->
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Loader -->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../assets/css/icons.css" />
    <!-- App CSS -->
    <link rel="stylesheet" href="../assets/css/app.css" />
    <link rel="stylesheet" href="../assets/css/dark-sidebar.css" />
    <link rel="stylesheet" href="../assets/css/dark-theme.css" />
    <!-- DataTable CSS -->
    <link href="../assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Sidebar Wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true" id="sidebar">
            <div class="sidebar-header">
                <div class="img-fluid">
                    <img src="../assets/images/knjt.png" class="logo-icon-2 w-75" alt="knjt.png" />
                </div>
                <a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i></a>
            </div>
            <!-- Navigation -->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="dashboard.php">
                        <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i></div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li class="menu-label">Menu Utama</li>
                <li>
                    <a href="buku.php">
                        <div class="parent-icon icon-color-2"><i class="bx bx-columns"></i></div>
                        <div class="menu-title">Buku</div>
                    </a>
                </li>
                <li>
                    <a href="koleksi_buku.php">
                        <div class="parent-icon icon-color-3"><i class="bx bx-book"></i></div>
                        <div class="menu-title">Koleksi Buku</div>
                    </a>
                </li>
                <li>
                    <a href="ulasan.php">
                        <div class="parent-icon icon-color-4"><i class="bx bx-book-open"></i></div>
                        <div class="menu-title">Ulasan</div>
                    </a>
                </li>
                <li>
                    <a href="riwayat.php">
                        <div class="parent-icon icon-color-5"><i class="bx bx-message-square-add"></i></div>
                        <div class="menu-title">Riwayat</div>
                    </a>
                </li>
                <li>
                    <a href="chatai.php">
                        <div class="parent-icon icon-color-5"><i class="lni lni-reddit"></i></i></div>
                        <div class="menu-title">Tanya Bot</div>
                    </a>
                </li>
            </ul>
            <!-- End Navigation -->
        </div>
        <!-- End Sidebar Wrapper -->

        <!-- Header -->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <ul class="list-unstyled ms-auto" style="margin-top: -.5rem;">
                    <li class="nav-item dropdown dropdown-user-profile">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="d-flex user-box align-items-center">
                                <div class="user-info">
                                    <p class="user-name mb-0"><?php echo $_SESSION['nama_pengguna']; ?></p>
                                    <p> Pengguna </p>
                                </div>
                                <img src="../assets/images/michie.jpg" class="user-img" alt="user avatar">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" style="box-shadow:0px 0px 20px red;">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center text-danger" href="../logout.php"><i class="bx bx-power-off fs-5 fw-bold"></i><span class="fw-bold">Logout</span></a>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <!-- End Header -->

<!-- Page Wrapper -->
<div class="page-wrapper" id="content">
    <!-- Page Content Wrapper -->
    <div class="page-content-wrapper">

            <div class="chat-window" id="chat-window">
                <!-- Pesan akan ditampilkan di sini -->
            </div>
            <div class="chat-input">
                <input type="text" id="user-input" placeholder="Tanyakan apa saja bebas bro..." />
                <button class="send-button" onclick="sendMessage()">Kirim</button>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .chatbot-container {
        width: 450px; /* Lebar yang lebih besar */
        max-width: 90%;
        height: 500px; /* Tinggi yang lebih besar */
        margin: 20px auto;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #ffffff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
    }

    .chat-header {
        background-color: #007bff;
        color: white;
        padding: 15px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        text-align: center;
    }

    .chat-window {
        flex: 1; /* Memungkinkan chat window mengisi ruang */
        overflow-y: auto;
        padding: 15px;
        border-bottom: 1px solid #ccc;
        display: flex;
        flex-direction: column;
    }

    .user-message, .bot-message {
        margin: 5px 0;
        display: flex;
        align-items: center;
    }

    .user-message {
        justify-content: flex-end;
    }

    .bot-message {
        justify-content: flex-start;
    }

    .user-message span, .bot-message span {
        max-width: 70%;
        padding: 10px 15px;
        border-radius: 10px;
        color: white;
        line-height: 1.5;
        word-wrap: break-word; /* Mengatasi overflow teks */
    }

    .user-message span {
        background-color: #007bff;
    }

    .bot-message span {
        background-color: #28a745;
    }

    .chat-input {
        display: flex;
        padding: 15px;
        border-top: 1px solid #ccc;
    }

    .chat-input input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-right: 10px;
    }

    .send-button {
        padding: 10px 15px;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .send-button:hover {
        background-color: #0056b3;
    }

    .chat-window img {
        border-radius: 50%;
        margin-right: 10px;
    }
</style>

<script>
    function sendMessage() {
        const userInput = document.getElementById('user-input');
        const userMessage = userInput.value;

        if (userMessage.trim() === '') {
            return; // Jika input kosong, keluar dari fungsi
        }

        // Tampilkan pesan pengguna di chat window
        displayMessage(userMessage, 'user');

        // Kosongkan input
        userInput.value = '';

        // Simulasi respons bot
        setTimeout(() => {
            const botResponse = getBotResponse(userMessage);
            displayMessage(botResponse, 'bot');
        }, 1000); // Bot akan merespons setelah 1 detik
    }

    function displayMessage(message, sender) {
        const chatWindow = document.getElementById('chat-window');
        const messageDiv = document.createElement('div');

        // Tambahkan class untuk gaya pesan user atau bot
        messageDiv.classList.add(sender === 'user' ? 'user-message' : 'bot-message');

        if (sender === 'bot') {
            // Jika pesan dari bot, tambahkan gambar
            const botImg = document.createElement('img');
            botImg.src = "../assets/images/michie.jpg"; // Ganti dengan URL gambar bot
            botImg.alt = 'JAGUNG';
            botImg.style.width = '40px'; // Sesuaikan ukuran avatar
            botImg.style.height = '40px'; // Sesuaikan ukuran avatar
            messageDiv.appendChild(botImg);
        }

        // Tambahkan teks pesan
        const messageText = document.createElement('span');
        messageText.textContent = message;
        messageDiv.appendChild(messageText);

        // Tambahkan pesan ke chat window
        chatWindow.appendChild(messageDiv);
        chatWindow.scrollTop = chatWindow.scrollHeight; // Scroll ke bawah
    }

    function getBotResponse(input) {
        const lowerCaseInput = input.toLowerCase();

        if (lowerCaseInput.includes('buku')) {
            return 'Kami memiliki banyak koleksi buku. Apa judul buku yang Anda cari?';
        } else if (lowerCaseInput.includes('teknologi')) {
            return 'Kami memiliki berbagai buku tentang teknologi. Anda bisa melihat koleksi terbaru kami.';
        } else if (lowerCaseInput.includes('ulasan')) {
            return 'Silakan kunjungi halaman ulasan untuk melihat rekomendasi buku dari pengguna lain.';
        } else if (lowerCaseInput.includes('gilang')) {
            return 'Gilang adalah Karyawan Sadigit Terbaik Sepanjang masa.';
        } else if (lowerCaseInput.includes('website')) {
            return 'Okey yang membuat Website ini adalah Agung.';
        } else if (lowerCaseInput.includes('boking')) {
            return 'Silahkan cek Dashboard Kak.';
        } else if (lowerCaseInput.includes('masalah')) {
            return 'Harap Bersabar Kami bakal memperbaiki masalah anda.';
        } else if (lowerCaseInput.includes('agung')) {
            return 'Okey Agung adalah orang yang membuat website ini.';
        } else {
            return 'Maaf, yang jelas nanya nya dong mas BROOOO....';
        }
    }
</script>


            <!-- End Page Content Wrapper -->
        </div>
        <!-- End Page Wrapper -->

        <!-- Start Overlay -->
        <div class="overlay toggle-btn-mobile"></div>
        <!-- End Overlay -->

        <!-- Start Back To Top Button -->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!-- End Back To Top Button -->

        <!-- Footer -->
        <div class="footer">
            <p class="mb-0">Kelompok 1 @2024 | Developed By : <a href="https://themeforest.net/user/codervent" target="_blank">codervent</a></p>
        </div>
        <!-- End Footer -->
    </div>
    <!-- End Wrapper -->

    <!-- JavaScript -->
    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!-- Vector map JavaScript -->
    <script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-in-mill.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-au-mill.js"></script>
    <script src="../assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="../assets/js/index.js"></script>
    <!-- Data Tables JS -->
    <script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            // Toggle sidebar on menu button click
            $('.toggle-btn').click(function () {
                $('.wrapper').toggleClass('sidebar-collapsed');
                adjustContentWidth();
            });

            // Initialize DataTables
            $('#example').DataTable();
            $('#example2').DataTable();
        });

        function adjustContentWidth() {
            if ($('.wrapper').hasClass('sidebar-collapsed')) {
                $('#content .page-content .col-12').css('width', '100%');
            } else {
                $('#content .page-content .col-12').css('width', '');
            }
        }
    </script>
    <!-- App JS -->
    <script src="../assets/js/app.js"></script>
    <script>
        new PerfectScrollbar('.dashboard-social-list');
        new PerfectScrollbar('.dashboard-top-countries');
    </script>
</body>

</html>
