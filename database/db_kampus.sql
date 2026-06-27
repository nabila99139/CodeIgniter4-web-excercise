CREATE DATABASE IF NOT EXISTS db_kampus;

USE db_kampus;

CREATE TABLE IF NOT EXISTS tb_mahasiswa (
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    prodi VARCHAR(100) NOT NULL,
    universitas VARCHAR(120) NOT NULL,
    no_hp VARCHAR(20) NOT NULL,
    PRIMARY KEY (nim)
);

INSERT INTO tb_mahasiswa (nim, nama, prodi, universitas, no_hp) VALUES
('32602400080', 'Nabila Anindya Hassya', 'Teknik Informatika', 'Universitas Islam Sultan Agung', '081234567890')
ON DUPLICATE KEY UPDATE
    nama = VALUES(nama),
    prodi = VALUES(prodi),
    universitas = VALUES(universitas),
    no_hp = VALUES(no_hp);
