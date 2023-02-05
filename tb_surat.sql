

DROP TABLE IF EXISTS `tb_surat`;

CREATE TABLE `tb_surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `nik` varchar(17) DEFAULT NULL,
  `umur` int(2) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `dari_tgl` varchar(20) DEFAULT NULL,
  `sampai_tgl` varchar(20) DEFAULT NULL,
  `jenis_surat` varchar(200) DEFAULT NULL,
  `pesan` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



insert  into `tb_surat`(`id`,`nama`,`nik`,`umur`,`agama`,`jk`,`pekerjaan`,`dari_tgl`,`sampai_tgl`,`jenis_surat`,`pesan`) values 
(3,'Dedi','3244332212222',20,'Islam','L','Karyawan','2022-09-28','2022-09-30','Surat Keterangan Miskin','Untuk Memperbaiki Rumah');


