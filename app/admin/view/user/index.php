{extend name="public:layout" /}
{block name="title"}用户列表{/block}
{block name="css"}{/block}
{block name="container"}
<!-- Page Content -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <!-- Condensed Table -->
            <div class="block">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="{:url('index')}">用户列表</a>
                    </li>
                    <li>
                        <a href="{:url('edit')}">添加用户</a>
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
                        <div class="row data-table-toolbar">
                            <div class="col-sm-12">
                                <form class="search-bar" method="get" action="">
                                    <span>邮箱：</span>
                                    <input type="text" class="form-control" style="width:200px;" value="{$Request.get.email}" name="email" placeholder="请输入邮箱">
                                    <input type="submit" class="btn btn-primary" value="搜&nbsp;&nbsp;索">
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-condensed">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>邮箱</th>
                                    <th>手机号码</th>
                                    <th>最后一次登录时间</th>
                                    <th>最后一次登录IP</th>
                                    <th>备注</th>
                                    <th>状态</th>
                                    <th class="text-center" width="10%">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                {volist name="list" id="vo"}
                                <tr>
                                    <td>{$vo.id}</td>
                                    <td>{$vo.email}</td>
                                    <td>{$vo.phone}</td>
                                    <td>{$vo.last_login_time ? date('Y-m-d H:i:s',$vo.last_login_time):''}</td>
                                    <td>{$vo.last_login_ip}</td>
                                    <td>{$vo.remark}</td>
                                    <td>{eq name="vo.status" value="1"}启用{else/}<font color="red">禁用</font>{/eq}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-xs btn-default" href="{:url('edit',['id'=>$vo.id])}" title="修改"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-xs btn-default" href="javascript:;" onclick="J_ajax_delete(this)" url="{:url('delete',['id'=>$vo.id])}" title="删除"><i class="fa fa-times"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                {/volist}
                                </tbody>
                            </table>
                            <div class="pull-right">
                                <span class="page-total">共{$list->total()}条记录</span>
                                {$page}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Condensed Table -->
        </div>
    </div>
</div>
<!-- END Page Content -->
{/block}
{block name="js"}{/block}