<?php

function cadpessoas_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/claudemir-cadpessoas/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Cadastro de Pessoas</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=cadpessoas_create'); ?>">Adicionar Novo</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "cadpessoas";

        $rows = $wpdb->get_results("SELECT id,name,email from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">ID</th>
                <th class="manage-column ss-list-width">Nome</th>
                <th class="manage-column ss-list-width">E-mail</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $row->id; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->name; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->email; ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=cadpessoas_update&id=' . $row->id); ?>">Update</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}
