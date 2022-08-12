<?php

function cadpessoas_update() {
    global $wpdb;
    $table_name = $wpdb->prefix . "cadpessoas";
    $id = $_GET["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
                array('name' => $name,'email' => $email), //data
                array('id' => $id), //where
                array('%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $id));
    } else {// Selecionando valor para atualizar
        $cadpessoas = $wpdb->get_results($wpdb->prepare("SELECT id,name,email from $table_name where id=%s", $id));
        foreach ($cadpessoas as $s) {
            $name = $s->name;
            $email = $s->email;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/claudemir-cadpessoas/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Atualizar Registro de Pessoas</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Cadastro de pessoas excluido</p></div>
            <a href="<?php echo admin_url('admin.php?page=cadpessoas_list') ?>">&laquo; Voltar para lista de cadastros</a>

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Cadastro de pessoas atualizado</p></div>
            <a href="<?php echo admin_url('admin.php?page=cadpessoas_list') ?>">&laquo; Voltar lista de cadastros</a>

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
                    <tr><th>Nome</th><td><input type="text" name="name" value="<?php echo $name; ?>"/></td></tr>
                    <tr><th>E-mail</th><td><input type="text" name="email" value="<?php echo $email; ?>"/></td></tr>
                    <tr><td colspan="2" style="text-align: center;"><input type='submit' name="update" value='Atualizar' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Excluir' class='button' onclick="return confirm('Tem certeza que quer excluir este registro?')"></td></tr>
                </table>
                
            </form>
        <?php } ?>

    </div>
    <?php
}