{extend name="public:layout" /}
{block name="title"}用户编辑{/block}
{block name="css"}{/block}
{block name="container"}
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block">
                <ul class="nav nav-tabs">
                    <li>
                        <a href="{:url('index')}">用户列表</a>
                    </li>
                    <li {empty name="Request.param.id"}class="active"{/empty}>
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
                <div class="block-content block-content-narrow">
                    <form class="J_ajaxForm" action="{:url('edit')}" method="post" onsubmit="return false;">
                        <div class="form-group">
                            <label>邮箱 <span class="must_red">*</span></label>
                            <input class="form-control" type="text" name="email" placeholder="邮箱" value="{$data.email|default=''}">
                        </div>
                        <div class="form-group">
                            <label>密码 <span class="must_red">*</span></label>
                            <input class="form-control" type="password" name="password" placeholder="密码">
                        </div>
                        <div class="form-group">
                            <label>确认密码 <span class="must_red">*</span></label>
                            <input class="form-control" type="password" name="password_confirm" placeholder="确认密码">
                        </div>
                        <div class="form-group">
                            <label>手机号码 </label>
                            <input class="form-control" type="text" name="phone" placeholder="手机号码" value="{$data.phone|default=''}">
                        </div>
                        <div class="form-group">
                            <label>备注 </label>
                            <textarea class="form-control" name="remark" rows="6" placeholder="备注">{$data.remark|default=''}</textarea>
                        </div>
                        <div class="form-group">
                            <label>状态 </label>
                            <select class="form-control" name="status">
                                <option value="1" {if condition="isset($data) AND $data.status eq '1'"}selected{/if}>启用</option>
                                <option value="0" {if condition="isset($data) AND $data.status eq '0'"}selected{/if}>禁用</option>
                            </select>
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