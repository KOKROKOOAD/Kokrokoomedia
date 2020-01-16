<template>
  <div class="container">
    <div class="modal fade" id="viewFile" tabindex="-1" role="dialog" style="margin-left: 225px;">
      <div class="modal-dialog modal-lg" role="document">
        <form @submit.prevent id="segment-form">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class-modal-title>{{fileName}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body text-center">
              <div>
                <iframe
                  allowfullscreen
                  v-show="fileTypes === 'video' || fileTypes === 'audio' "
                  class="embed-responsive-item"
                  autoplay
                  :src=" local_path + fileName"
                  style="width:80%;min-height:600px;"
                  frameborder="0"
                ></iframe>
              </div>

              <!--if file type is image-->
              <img
                v-show="fileTypes === 'image'"
                :src=" local_path + fileName"
                style="width:80%;min-height:400px;"
                frameborder="0"
              />
            </div>
            <div class="modal-footer">
              <!--                          <button v-show="fileTypes === 'application'" type="button" class="btn btn-primary waves-effect " data-dismiss="modal">Download</button>
              -->
              <button class="btn btn-mat btn-secondary" @click="acceptSub(sub_id,user_id)">Accept</button>
              <button
                class="btn btn-danger waves-effect waves-light"
                @click="rejectSub(sub_id,user_id)"
              >Reject</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Viewer from "viewerjs";
import store from "../../vuex/store";

export default {
  props: [
    "fileType",
    "showPendingTable",
    "approvedAd",
    "sub_id",
    "fileName",
    "media_id",
    "user_id"
  ],
  name: "viewFile",
  data() {
    return {
      path: "http://144.76.44.117:1990/kokrokoo-app/docs/",
      local_path: "/storage/",
      showView: true,
      ani: "animated fadeIn"
    };
  },
  mounted() {
    // this.viewImage();
  },
  methods: {
    viewImage() {
      const viewer = new Viewer(document.getElementById("image"), {
        modal: true,
        viewed() {
          viewer.zoomTo(1);
        },
        backdrop: "static"
      });
    },
    hideImageViewer() {
      this.ani = "animated fadeOut";
      this.showView = false;
      store.dispatch("getShowPendTable", true);
    },
    rejectSub(sub_id, user_id) {
      let formData = new FormData();
      formData.append("sub_id", sub_id);
      formData.append("user_id", user_id);
      axios.post("reject-sub/api", formData).then(function(res) {
        if (res.data === "success") {
          window.location = "pending-subscription";
        }
      });
    },
    acceptSub(sub_id, user_id) {
      let formData = new FormData();
      formData.append("sub_id", sub_id);
      formData.append("user_id", user_id);

      axios.post("accept-sub/api", formData).then(function(res) {
        if (res.data === "success") {
          window.location = "pending-subscription";
        }
      });
    }
  },
  computed: {
    fileTypes() {
      let f_type = this.fileType.split("/");
      return f_type[0];
    }
  }
};
</script>

<style scoped>
</style>