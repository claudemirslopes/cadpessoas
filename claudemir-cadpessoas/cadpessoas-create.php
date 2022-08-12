<?php

function cadpessoas_create() {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . "cadpessoas";

        $wpdb->insert(
                $table_name, //table
                array('id' => $id, 'name' => $name, 'email' => $email), //data
                array('%s', '%s') //data format
        );
        $message.="CadPessoas inseridas";
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/claudemir-cadpessoas/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Adicionar Nova Pessoa</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p><strong>OBS: </strong>Três caracteres alfabéticos para o ID</p>
            <table class='wp-list-table widefat fixed'>
                <tr>
                    <th class="ss-th-width">ID</th>
                    <td><input type="text" name="id" value="<?php echo $id; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Nome</th>
                    <td><input type="text" name="name" value="<?php echo $name; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">E-mail</th>
                    <td><input type="text" name="email" value="<?php echo $email; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type='submit' name="insert" value='Cadastrar' class='button' style="width: 100%;"></td>
                </tr>
            </table>
            
        </form>
    </div>
    <?php
}
