
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');
// require('./dashboard/js/moment');
// require('./dashboard/js/plugins/perfect-scrollbar.jquery.min');
// require('./dashboard/js/plugins/bootstrap-notify');
// require('./dashboard/js/paper-dashboard');
// require('./dashboard/js/paper-bootstrap2');
// require('./dashboard/js/paper-bootstrap-wizard');
// require('./dashboard/js/jquery.bootstrap.wizard');
// require('./dashboard/js/lib/sweetalert/sweetalert.min');
// require('./dashboard/js/core/jquery-ui');
 require("./dashboard/js/jquery.validate.min");
// require("./dashboard/js/notify.min");
 require('jquery-validation');
//require('./dashboard/js/multi-step-modal');
require('./dashboard/js/validations');
require('./calender/segment-validation');

//require('./calender/calendar');

// require('../dash/jquery-ui/jquery-ui.min');
// //require('../dash/jquery-slimscrolljs/jquery-ui.min');
// require('../dash/jquery-ui/jquery-ui.min');
// require('../dash/bower_components/modernizrjs/modernizr');
// require('../dash/bower_components/modernizrjs/css-scrollbars');
// require('../dash/jquery-ui/jquery-ui.min');
// require('../dash/bower_components/jquery-slimscrolljs/jquery.slimscroll');
// require('../dash/js/pcoded.min');
// require('../dash/js/vartical-layout.min');
// require('../dash/js/pcoded.min');
require('../js/calender/notify');
 require('../js/calender/script');
/*  require('chart.js');
 */require('../js/app/app');
//require('viewerjs');

// //require('../dash/js/jquery.mCustomScrollbar.concat.min');

window.Vue = require('vue');
import  VueRouter from 'vue-router';
Vue.use(VueRouter);

import {routes} from './vue-router/routes';


import FullCalendar from 'vue-full-calendar'; //Import Full-calendar
Vue.use(FullCalendar);


const router  = new VueRouter({
    mode : 'history',
    routes
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('create-ad', require('./components/subscriptions/allSub.vue').default);
Vue.component('user-transact', require('./components/subscriptions/transactions').default);
Vue.component('pending-sub', require('./components/subscriptions/pendingSub').default);
Vue.component('inactive-sub', require('./components/subscriptions/inactive-sub').default);
Vue.component('active-sub', require('./components/subscriptions/active-sub').default);
Vue.component('my-sub', require('./components/subscriptions/mySub').default);
Vue.component('payment', require('./components/subscriptions/payment').default);
Vue.component('create-print-rate-cards', require('./components/subscriptions/createPrintAd').default);
Vue.component('create-ad-weekdays', require('./components/subscriptions/createAdWeekdays').default);
Vue.component('file-size-warning-modal', require('./components/subscriptions/fileSizeWarningModal').default);
Vue.component('display-media-houses', require('./components/subscriptions/displayMediaHouseImags').default);
Vue.component('invoice', require('./components/subscriptions/invoice').default);
Vue.component('del-selected-media-house', require('./components/subscriptions/selectedMediaHouse').default);
Vue.component('ad-summary', require('./components/subscriptions/adSummary').default);
Vue.component('payment-type', require('./components/payment/paymentType').default);
Vue.component('show-processing', require('./components/payment/showProcess').default);
Vue.component('show-processing', require('./components/payment/showProcess').default);
Vue.component('file-upload', require('./components/subscriptions/fileUpload').default);
Vue.component('select-rate-card', require('./components/subscriptions/selectRateCard').default);
Vue.component('side-bar', require('./components/navigation/sidebar.vue').default);
Vue.component('pre-loader', require('./components/preloader/preLoader').default);
Vue.component('sub', require('./components/subscriptions/subs').default);
Vue.component('segments', require('./components/subscriptions/selectRateAndTime').default);
Vue.component('modals', require('./components/tests/modals').default);
Vue.component('segment-title', require('./components/subscriptions/segmentTitle').default);
Vue.component('update-segment', require('./components/subscriptions/updateSegment').default);
Vue.component('home', require('./components/subscriptions/home'));
Vue.component('print-rate-card', require('./components/subscriptions/printRateCare').default);
Vue.component('expired-sub', require('./components/subscriptions/expiredSub').default);
Vue.component('accepted-sub', require('./components/subscriptions/acceptedSubs').default);
Vue.component('rejected-sub', require('./components/subscriptions/rejectedSub').default);
Vue.component('active-sub', require('./components/subscriptions/activeSub').default);
Vue.component('pending-sub', require('./components/subscriptions/pendingSub').default);
//Vue.component('rate-card-title', require('./components/rateCards/createRateCardTitle').default);
Vue.component('view-file', require('./components/subscriptions/viewFile').default);
Vue.component('create-rate-card', require('./components/rateCards/createRateCards').default);
Vue.component('dashboard', require('./components/dashboard/dashboard').default);
Vue.component('pagination', require('./components/partials/pagination').default);
Vue.component('search', require('./components/partials/search').default);
Vue.component('view-rate-cards', require('./components/rateCards/viewRateCard').default);
Vue.component('downloadable-subs', require('./components/downloadableSubs/subscriptions').default);
Vue.component('manage-admins', require('./components/manageAdmins/manageAdmins').default);
Vue.component('create-admins', require('./components/manageAdmins/createAdmin').default);
Vue.component('form-validation-message', require('./components/info-panel/infoPanel').default);
Vue.component('update-admin-controls', require('./components/updateAdminControls/updateAdminControls').default);
Vue.component('data-tables', require('./components/tests/datatables').default);
Vue.component('view-print-rate-card', require('./components/rateCards/printRateCare').default);

const app = new Vue({
    el: '#app',
    router,
});
