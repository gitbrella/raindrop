"use strict";!function(a){function t(a){a.find(".row, .acf-row:not( .acf-clone )").length?a.parent().find('.sub_field[data-field_name="status"], .acf-field[data-name="status"]').first().addClass("hidden"):a.parent().find('.sub_field[data-field_name="status"], .acf-field[data-name="status"]').first().removeClass("hidden")}function e(t,e){var s=0,f=e.find('.row .sub_field[data-field_name="status"], .acf-row:not( .acf-clone ) .acf-field[data-name="status"]'),d=t.find('.sub_field[data-field_name="status"], .acf-field[data-name="status"]').first().find("select");f.each(function(t,e){s+=parseInt(a(e).find("select").val())});var n=Math.ceil(s/f.length);n%5<3?n%5!==0&&(n=5*Math.floor(n/5)):n=5*Math.ceil(n/5),d.val(n)}function s(a,s){t(s),s.find(".row, .acf-row:not( .acf-clone )").length?e(a,s):a.find('.sub_field[data-field_name="status"], .acf-field[data-name="status"]').first().find("select").val(0)}function f(){a('tr[data-field_key="psp_st_sub_tasks"] .add-row-end.acf-button, tr[data-field_key="psp_st_sub_tasks"] .acf-button-add, tr[data-field_key="psp_st_sub_tasks"] .acf-button-remove, .acf-field-repeater[data-key="psp_st_sub_tasks"] a[data-event="add-row"]').on("click",function(){var t=a(this).closest('.sub_field.field_type-repeater[data-field_key="psp_st_sub_tasks"], .acf-field-repeater[data-key="psp_st_sub_tasks"]'),e=t.closest(".row, .acf-row:not( .acf-clone )");setTimeout(function(){s(e,t),f()},"500")})}a(document).ready(function(){a('.sub_field.field_type-repeater[data-field_key="psp_st_sub_tasks"], .acf-field-repeater[data-key="psp_st_sub_tasks"]').each(function(s,f){t(a(f)),a(f).find(".row, .acf-row:not( .acf-clone )").length&&e(a(f).closest(".row, .acf-row:not( .acf-clone )"),a(f))}),a('.sub_field.field_type-repeater[data-field_key="psp_st_sub_tasks"] .row .sub_field[data-field_name="status"], .acf-field-repeater[data-key="psp_st_sub_tasks"] .acf-row:not( .acf-clone ) .acf-field[data-name="status"]').on("change",function(t){var s=a(this).closest('.sub_field.field_type-repeater[data-field_key="psp_st_sub_tasks"], .acf-field-repeater[data-key="psp_st_sub_tasks"]'),f=s.closest(".row, .acf-row:not( .acf-clone )");e(f,s)}),f(),"undefined"!=typeof acf.add_action&&acf.add_action("change",function(t){var e=a(t).closest(".acf-field");if("psp_st_sub_tasks"===e.data("key")){var f=e.closest(".acf-row:not( .acf-clone )");s(f,e)}})})}(jQuery);
//# sourceMappingURL=admin.js.map