
<?php 

/*Visualiza el titulo, autor y fecha del post en las busquedas*/

    global $contador;
    $contador ++; // Incrementamos el contador de filas
?>
<tr>
    <td class=" <?php echo ($contador % 2 == 0) ? 'par' : 'impar'; ?>"> <?php the_title(); ?></td>  <!--¿Quitar  <?php /*the_title(); */?>?-->
    <td> <?php the_author(); ?></td>
    <td> <?php the_time('j', 'm', 'y'); ?></td>
</tr>