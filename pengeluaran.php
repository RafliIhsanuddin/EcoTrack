<?php

require_once 'connect.php';
$var = "SELECT * FROM pengeluaran";
$hasil= $conn -> query($var);


?>












<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <title>EcoTrack-Pengeluaran</title>
    <!-- <style>
        * {
            border: 1px solid black;
        }
    </style> -->
</head>

<body class="bg-gradient-to-r from-[#EB66A1] via-[#FF6F91] to-[#FF9671] min-width-md">
    <div class="lg:">
        <div class="">
            <div class="font-bold mx-auto my-3 text-center justify-center py-6 ">
                <span class="bg-white w-1/6 h-20 rounded-2xl py-3 px-3">Pengeluaran</span>
            </div>
        </div>
        <div class="px-5">
            <div
                class="bg-white rounded-2xl shadow-2xl mb-3 py-3 md:w-full container mx-auto sm:flex sm:flex-wrap sm:gap-2 sm:justify-center">
                <div class=" sm:mb-0 py-0.5  sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white mb-2">
                    <input type="text" id="nama" placeholder="Bukti Transaksi" required
                        class="focus:ring-black shadow-lg bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-slate-500 focus:text-black px-5 rounded-full w-full h-full">
                </div>
                <div class=" sm:mb-0 py-0.5  sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white mb-2">
                    <input type="text" id="nama" placeholder="Jenis Transaksi" required
                        class="focus:ring-black shadow-lg bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-slate-500 focus:text-black px-5 rounded-full w-full h-full">
                </div>
                <div class=" sm:mb-0 py-0.5  sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white mb-2">
                    <input type="date" id="nama" placeholder="Tanggal Transaksi" required
                        class="focus:ring-black shadow-lg bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-slate-500 focus:text-black px-5 rounded-full w-full h-full">
                </div>
                <div class=" sm:mb-0 py-0.5  sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white mb-2">
                    <input type="text" id="nama" placeholder="Nomor Transaksi" required
                        class="focus:ring-black shadow-lg bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-slate-500 focus:text-black px-5 rounded-full w-full h-full">
                </div>
                <div class=" sm:mb-0 py-0.5  sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white mb-2">
                    <input type="text" id="nama" placeholder="Status" required
                        class="focus:ring-black shadow-lg bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-slate-500 focus:text-black px-5 rounded-full w-full h-full">
                </div>
                <div
                    class=" sm:mb-0 border-slate-200 sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto  mb-2 hover:opacity-[0.95] active:shadow-none mt-1">
                    <input type="submit" id="submit"
                        class="bg-[#9F73AB] py-1 shadow-lg text-2xl font-bold placeholder:text-black px-5 rounded-full w-full">
                </div>
            </div>
        </div>
        <div class="lg:flex">
            <div class="mx-auto">
                <div class="justify-center items-center mx-auto mb-0 flex">
                    <table
                        class="text-sm md:text-2xl shadow-2xl font-poppins border-purple-200 w-1/3 rounded-2xl overflow-hidden mt-0 mx-auto">
                        <thead class="text-white ">
                            <tr>
                                <th class="py-3 px-1 md:px-[5px] lg:px-[20px] bg-[#645CAA]">
                                    <p class="">no</p>
                                </th>
                                <th class="py-3 px-1 md:px-[5px] lg:px-[20px] bg-[#645CAA]">
                                    <p class="">nama barang</p>
                                </th>
                                <th class="py-3 px-1 md:px-[5px] lg:px-[20px] bg-[#645CAA]">
                                    <p class="">harga barang</p>
                                </th>
                                <th class="py-3 px-1 md:px-[5px] lg:px-[20px] bg-[#645CAA]">
                                    <p class="">Jumlah Barang</p>
                                </th>
                                <th class="py-3 px-1 md:px-[5px] lg:px-[20px] bg-[#645CAA]">
                                    <p class="">satuan</p>
                                </th>
                                <th class="py-3 px-1 md:px-[5px] lg:px-[20px] bg-[#645CAA]">
                                    <div>referensi/</div>
                                    <div>toko</div>
                                </th>
                                <th class="py-3 px-1 md:px-[5px] lg:px-[20px] bg-[#645CAA]">
                                    <p class="">hapus</p>
                                </th>
                                <th class="py-3 px-1 md:px-[5px] lg:px-[20px] bg-[#645CAA]">
                                    <p class="">ubah</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-purple-900 text-center justify-center font-semibold">
                        <?php if($hasil->num_rows > 0) : ?>
                            <?php $i = 1; ?>
                            <?php while($baris = $hasil->fetch_assoc()): ?>  
                            <tr class="bg-purple-200 mx-auto">
                                <td class="py-3 px-1 md:px-[5px] lg:px-[20px]"><?= $i; ?></td>
                                <td class="py-3 px-1 md:px-[5px] lg:px-[20px]"><?php echo $baris['Nama_Barang'];?></td>
                                <td class="py-3 px-1 md:px-[5px] lg:px-[20px]"><?php echo $baris['Harga_Barang'];?></td>
                                <td class="py-3 px-1 md:px-[5px] lg:px-[20px]"><?php echo $baris['Jumlah_Barang'];?></td>
                                <td class="py-3 px-1 md:px-[5px] lg:px-[20px]"><?php echo $baris['Satuan'];?></td>
                                <td class="py-3 px-1 md:px-[5px] lg:px-[20px]"><?php echo $baris['Referensi'];?></td>
                                <td class="py-3 px-1 md:px-[5px] lg:px-[20px]"><a href="hapus.php?id=<?= $baris['Id_Barang'];?>" onclick="return confirm('yakin?')" class="hover:text-red-700">Hapus</a></td>
                                <td class="py-3 px-1 md:px-[5px] lg:px-[20px]"><a href="ubah.php?id=<?= $baris['Id_Barang'];?>" class="hover:text-green-700">Ubah</a></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endwhile?>
                        <?php endif?> 
                        </tbody>
                    </table>
                </div>
                <div class="md:flex mx-auto lg:mx-52">
                    <div class="flex md:mx-auto lg:mx-auto">
                        <a href=""
                            class="bg-[#645CAA] py-[7px] w-[300px] md:w-44 h-10 text-center my-2 md:my-4 mx-auto rounded-full hover:opacity-[0.95] active:shadow-none shadow-md">Ubah</a>
                    </div>
                    <div class="flex md:mx-auto lg:mx-auto">
                        <a href=""
                            class="bg-[#645CAA] py-[6px] w-[300px] md:w-44 h-10 text-center my-2 md:my-4 mx-auto rounded-full hover:opacity-[0.95] active:shadow-none shadow-md">Hapus</a>
                    </div>
                    <div class="flex md:mx-auto lg:mx-auto">
                        <a href="pengtambah.php"
                            class="bg-[#645CAA] py-[7px] w-[300px] md:w-44 h-10 text-center my-2 md:my-4 mx-auto rounded-full hover:opacity-[0.95] active:shadow-none shadow-md">Tambah</a>
                    </div>
                </div> 
            </div>

</body>

</html>