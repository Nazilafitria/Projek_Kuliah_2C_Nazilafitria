 <html>
    <body>
        <?php
            echo "Mencari jumblah huruf vokal dalam suatu kata";
            echo "<br>"; //untuk ganti baris
            $jumlah = 0;
            $kata="belajar PHP"; //suatu kata
            $huruf="a"; // huruf vokal yang dicari bisa huruf a,e,u,i,o
            for ($i=0; $i<strlen($kata); $i++)
                        {
                            if(substr($kata, $i, 1) == $huruf)
                            {
                                $jumlah ++;
                            }
                        }
                        echo "jumlah huruf" . $huruf . "dalam kata" .
                        $kata . " : "; echo "<br>"; echo $jumlah;
        ?>
    </body>
 </html>