# uassbd

(Sudah melakukan Demo Program UAS Pada Selasa, 5 juli 2022 jam 21.00)

Dari Tugas UTS sebelumnya saya membuat sebuah sistem informasi klinik sederhana dimana dalam sistem tersebut saya akan menampilkan

Modul data pasien
![image](https://user-images.githubusercontent.com/101730390/177023174-3c508d8a-4606-41e6-9b05-e4d2b3b77e56.png)


Dalam tabel pasien saya bisa menambahkan, menghapus dan mengedit data. Contohnya sebagai berikut :

Edit
![image](https://user-images.githubusercontent.com/101730390/177023221-4207f515-f965-4815-9166-ae4797d5b211.png)


Saya merubah data pasien Ojan menjadi Faruk

![image](https://user-images.githubusercontent.com/101730390/177023245-df09a526-6ff4-499e-af53-9302e93749ae.png)


Tambah
Saya juga bisa Menambah data pasien sebagai berikut :

![image](https://user-images.githubusercontent.com/101730390/177023279-6eefe554-1053-4fa5-8c7d-1124d37a9e59.png)
![image](https://user-images.githubusercontent.com/101730390/177023284-a848a3ee-854e-4d9c-baab-19aaf7271148.png)


Modul data Dokter
Seperti data pasien data dokter bisa di berikan perintah tamabah, hapus dan juga edit.

![image](https://user-images.githubusercontent.com/101730390/177023301-63d58c89-f554-4e80-b42c-80891c124b41.png)


Modul data Obat
Di dalam modul data obat saya menambahkan Triger

// IMPLEMENTASI TRIGGER

// table untuk trigger

create table log_obat(id_log int(100) auto_increment primary key, id_obat int(10), nobat_lama varchar(100), obat_baru varchar(100), waktu date not null) // trigger

create trigger update_nama_obat before update on obat for each row insert into log_obat set id_obat=old.id_obat, obat_lama = old.nama_obat, obat_baru=new.nama_obat, waktu = now();

// END IMPLEMENTASI TRIGGER

![image](https://user-images.githubusercontent.com/101730390/177023449-bdae0dcb-5c27-46fc-8043-da4f4a92e6dd.png)
![image](https://user-images.githubusercontent.com/101730390/177023455-9e719b09-7b8b-4492-a5eb-c051a3d31a17.png)


Fungsi dari triger disini untuk menampilkan perubahan nama obat setelah dilakukan proses update.

Modul data user
Modul data user dibuat untuk melakukan proses login

![image](https://user-images.githubusercontent.com/101730390/177023609-976df45a-010a-40da-a55f-5a225a603b29.png)
![image](https://user-images.githubusercontent.com/101730390/177023726-e2ca86e9-eecd-4a7a-92d2-c57f889add61.png)

Tampilan dashboard yang menampilkan informasi total data. Untuk menampikan total data tersebut saya mengimplementasikan fungsi sebagai berikut :

CREATE FUNCTION fn_totalUsers() RETURNS INT(11) UNSIGNED NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER RETURN (SELECT COUNT(id_pasien) FROM pasien)

![image](https://user-images.githubusercontent.com/101730390/177024853-7f576efa-7b54-4ef9-8664-eaa4b38de5a4.png)



implementasi view
// IMPLEMENTASI VIEW

CREATE VIEW viewPenyakit AS SELECT a.id_berobat, b.nama_pasien, b.jenis_kelamin, b.umur, a.keluhan_pasien, a.hasil_diagnosa, a.tgl_berobat, c.nama_dokter FROM berobat a JOIN pasien b ON a.id_pasien=b.id_pasien JOIN dokter c ON a.id_dokter=c.id_dokter WHERE b.jenis_kelamin='L'

// END IMPLEMENTASI VIEW

![image](https://user-images.githubusercontent.com/101730390/177024840-35960c94-82b3-411b-a3eb-db1ca37a3cc0.png)

