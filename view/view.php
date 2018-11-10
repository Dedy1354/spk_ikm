<?php

CREATE VIEW v_nilai_banyaknya_pelatihan AS SELECT a.ID_KEPENGURUSAN_PERIODE, b.BANYAKNYA_PELATIHAN
FROM kepengurusan_periode a LEFT JOIN banyaknya_pelatihan b
ON a.ID_KEPENGURUSAN_PERIODE=b.ID_KEPENGURUSAN_PERIODE

?>