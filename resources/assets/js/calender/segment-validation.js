// $(document).ready(function () {
//     "use strict";
//     //
//     // jQuery.validator.addMethod("lettersonlys", function(value, element) {
//     //     return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
//     // },'This  field accepts only characters');
//     //
//     // jQuery.validator.addMethod("alphanumeric", function(value, element) {
//     //     return this.optional(element) || /^[\w.]+$/i.test(value);
//     // }, "Letters, numbers, and underscores only please");
//
//     // validate personal account form
//     $('#segment-form').validate({
//         errorElement : 'span',
//         rules:{
//
//             title: {
//                 'required' : true,
//               //  'lettersonlys' : true,
//                 'minlength' : '10',
//                 'maxlength' : '20',
//
//             },
//
//         },
//
//         highlight :function (element) {
//             //add a error class to the  element
//             $(element).addClass('has-error');
//         },
//         unhighlight : function (element) {
//             $(element).removeClass('has-error');
//         }
//
//     });
//
//
// });