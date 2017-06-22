{extend name="public:layout" /}
{block name="title"}用户列表{/block}
{block name="css"}
<link rel="stylesheet" href="__STATIC__/assets/plugins/treeTable/treeTable.css">
{/block}
{block name="container"}
<!-- Page Content -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <!-- Condensed Table -->
            <div class="block">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="{:url('index')}">菜单列表</a>
                    </li>
                    <li>
                        <a href="{:url('lists')}">所有菜单</a>
                    </li>
                    <li>
                        <a href="{:url('edit')}">添加菜单</a>
                    </li>
                    <li class="pull-right">
                        <ul class="block-options push-10-t push-10-r">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                            <li>
                                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <div class="tab-pane active">
                        <form class="J_ajaxForm" method="post" action="{:url('list_orders')}">
                        <div class="row data-table-toolbar">
                            <div class="col-sm-12">
                                <div class="toolbar-btn-action">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm btn-all J_ajax_submit_btn">排 序</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-condensed treeTable" id="menus-table">
                                <thead>
                                <tr>
                                    <th width="10%">排序</th>
                                    <th width="10%">ID</th>
                                    <th>应用</th>
                                    <th>菜单名称</th>
                                    <th width="10%">状态</th>
                                    <th class="text-center" width="15%">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                {$category}
                                </tbody>
                            </table>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END Condensed Table -->
        </div>
    </div>
</div>
<!-- END Page Content -->
{/block}
{block name="js"}
<script src="__STATIC__/assets/plugins/treeTable/treeTable.js"></script>
<script>
    $(document).ready(function() {
        $("#menus-table").treeTable({
            indent : 20
        });
    });

    setInterval(function() {
        var refersh_time = getCookie('refersh_time_admin_menu_index');
        if (refersh_time == 1) {
            reloadPage(window);
        }
    }, 1000);
    setCookie('refersh_time_admin_menu_index', 0);
</script>
{/block}