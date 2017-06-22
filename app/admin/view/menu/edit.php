{extend name="public:layout" /}
{block name="title"}菜单编辑{/block}
{block name="css"}{/block}
{block name="container"}
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block">
                <ul class="nav nav-tabs">
                    <li>
                        <a href="{:url('index')}">菜单列表</a>
                    </li>
                    <li>
                        <a href="{:url('lists')}">所有菜单</a>
                    </li>
                    <li {empty name="Request.param.id"}class="active"{/empty}>
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
                <div class="block-content block-content-narrow">
                    <form class="J_ajaxForm" action="{:url('edit')}" method="post" onsubmit="return false;">
                        <div class="form-group">
                            <label>上级 <span class="must_red">*</span></label>
                            <select class="form-control" name="parent_id">
                                <option value="0">作为一级菜单</option>
                                {$select_category}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>名称 <span class="must_red">*</span></label>
                            <input class="form-control" type="text" name="title" value="{$data.title|default=''}" placeholder="菜单">
                        </div>
                        <div class="form-group">
                            <label>模块 <span class="must_red">*</span></label>
                            <input class="form-control" type="text" name="app" value="{$data.app|default=''}" placeholder="admin">
                        </div>
                        <div class="form-group">
                            <label>控制器 <span class="must_red">*</span></label>
                            <input class="form-control" type="text" name="controller" value="{$data.controller|default=''}" placeholder="index">
                        </div>
                        <div class="form-group">
                            <label>方法 <span class="must_red">*</span></label>
                            <input class="form-control" type="text" name="action" value="{$data.action|default=''}" placeholder="index">
                        </div>
                        <div class="form-group">
                            <label>参数</label>
                            <input class="form-control" type="text" name="condition" value="{$data.condition|default=''}" placeholder="id=3&p=3">
                        </div>
                        <div class="form-group">
                            <label>图标</label>
                            <input class="form-control" type="text" name="icon" value="{$data.icon|default=''}" placeholder="icon">
                        </div>
                        <div class="form-group">
                            <label>备注 </label>
                            <textarea class="form-control" name="remark" rows="6" placeholder="备注">{$data.remark|default=''}</textarea>
                        </div>
                        <div class="form-group">
                            <label>状态 </label>
                            <select class="form-control" name="status">
                                <option value="1" {if condition="isset($data) AND $data.status eq '1'"}selected{/if}>显示</option>
                                <option value="0" {if condition="isset($data) AND $data.status eq '0'"}selected{/if}>隐藏</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>类型 </label>
                            <select class="form-control" name="type">
                                <option value="1" {if condition="isset($data) AND $data.type eq '1'"}selected{/if}>权限认证+菜单</option>
                                <option value="0" {if condition="isset($data) AND $data.type eq '0'"}selected{/if}>只作为菜单</option>
                            </select>
                            注意：“权限认证+菜单”表示加入后台权限管理，纯碎是菜单项请不要选择此项。
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" value="{$data.id|default=''}" />
                            {:token()}
                            <button class="btn btn-primary J_ajax_submit_btn" type="submit">提交</button>
                            <a class="btn btn-default" href="javascript:history.back(-1)">返回</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{/block}
{block name="js"}{/block}