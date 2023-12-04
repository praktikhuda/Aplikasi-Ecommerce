<?php
    class backend{
        var $host = "localhost";
        var $name = "root";
        var $pass = "";
        var $db = "dz";

        function __construct(){
            $this->con = mysqli_connect($this->host, $this->name, $this->pass, $this->db);
            if(mysqli_connect_error()){
                echo "Koneksi database GAGAL : ".mysqli_connect_error();
            }
        }

        // MEMBUAT LOGIN
        public function login($user, $pass){
            session_start();
            $data = mysqli_query($this->con, "SELECT * FROM user WHERE username = '".$user."' AND password = '".$pass."';");
            $cek = mysqli_num_rows($data);
            if($cek > 0){
                $row = mysqli_fetch_assoc($data);
                $_SESSION["id"] = $row["id_user"];
                $_SESSION["username"] = $user;
                $_SESSION["lev"] = "1";
                header("Location: index.php");
            }else{
                echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!')</script>";
            }
        }

        // MEMBUAT LOGOUT
        function logout(){
            session_start();
            session_unset();
            session_destroy();
            
            header("Location: index.php");
            exit();
        }

        // PRODUK
        function tampilProduk(){
			$data = mysqli_query($this->con, "SELECT * FROM produk");
			while($d = mysqli_fetch_array($data)){
				$hasil[] = $d;
			}
			return $hasil;
		}

        // PRODUK VIEW
        function tampilProduk1($id){
			$data = mysqli_query($this->con, "SELECT * FROM produk WHERE id_produk = '".$id."'");
			while($d = mysqli_fetch_array($data)){
				$hasil[] = $d;
			}
			return $hasil;
		}

        // MASUKAN KERANJANG
        function masukanKeranjang($id_user, $id_produk, $qty){
            mysqli_query($this->con, "INSERT INTO keranjang VALUES(NULL, '".$id_user."', '".$id_produk."', '".$qty."');");
        }

        function keranjang($id){
            $data = mysqli_query($this->con, "SELECT * FROM keranjang INNER JOIN user ON keranjang.id_user = user.id_user INNER JOIN produk ON keranjang.id_produk = produk.id_produk WHERE keranjang.id_user = '".$id."';");
            $cek = mysqli_num_rows($data);
            if($cek > 0){
                while($d = mysqli_fetch_array($data)){
                    $hasil[] = $d;
                }
                return $hasil;
            }else{
                echo "Tidak Ada!!";
            }
        }
        function cekKeranjang($id){
            $data = mysqli_query($this->con, "SELECT COUNT(id_user) as totalData FROM keranjang WHERE id_user = '".$id."';");
            $row = mysqli_fetch_assoc($data);
            $data1 = $row["totalData"];
            return $data1;
        }
        
        // DELETE PRODUK KERANJANG
        function deleteKeranjang($id){
            $data = mysqli_query($this->con, "DELETE FROM keranjang WHERE id_keranjang = '".$id."';");
            if($data === TRUE){
                echo "Delete Berhasil";
            }else{
                echo $data->error;
            }
        }
        
        // TOTAL HARGA KERANJANG
        function totalHargaKenjang($id){
            $data = mysqli_query($this->con, "SELECT SUM(produk.harga * keranjang.qty) as total FROM keranjang INNER JOIN user ON keranjang.id_user = user.id_user INNER JOIN produk ON keranjang.id_produk = produk.id_produk WHERE keranjang.id_user = '".$id."';");
            $cek = mysqli_fetch_assoc($data);
            $total = $cek["total"];
            return $total;
        }

        // TAMBAH ALAMAT
        function tambahAlamat($id, $nama, $no, $kabupaten, $alamat){
			mysqli_query($this->con, "INSERT INTO alamat VALUES(NULL, '".$id."', '".$nama."', '".$no."', '".$kabupaten."', '".$alamat."');");
		}

        // LIHAT ALAMAT
        function lihatAlamat($id){
            $data = mysqli_query($this->con, "SELECT * FROM alamat WHERE id_user = '".$id."'");
            while($d = mysqli_fetch_array($data)){
				$hasil[] = $d;
			}
			return $hasil;
        }
        function lihatAlamat1($id){
            $data = mysqli_query($this->con, "SELECT * FROM alamat WHERE id_user = '".$id."'");
            $cek = mysqli_num_rows($data);
        }

        function pesan($id, $total){
            mysqli_query($this->con, "INSERT INTO pesan VALUES(NULL, '".$id."', '".$total."', 'no', 'kemas');");
        }

        function cekPesan(){   
                $data = mysqli_query($this->con, "SELECT * FROM pesan GROUP BY id_pesan DESC;");
                $cek = mysqli_fetch_assoc($data);
                $id = $cek["id_pesan"];
                return $id;
        }

        function uploadBukti($id, $nama){
            mysqli_query($this->con, "UPDATE pesan SET bukti = '".$nama."' WHERE id_pesan = '".$id."';");
        }

        function viewPesanan($id){
            $data = mysqli_query($this->con, "SELECT * FROM pesan INNER JOIN alamat ON pesan.id_alamat = alamat.id_alamat WHERE alamat.id_user = '".$id."' GROUP BY pesan.id_pesan DESC;");
            while($d = mysqli_fetch_array($data)){
				$hasil[] = $d;
			}
			return $hasil;
        }

        function notif($id){
            $data = mysqli_query($this->con, "SELECT * FROM notif WHERE id_user = $id;");
            while($d = mysqli_fetch_array($data)){
                $hasil[] = $d;
            }
            return $hasil;
        }
    }
?>