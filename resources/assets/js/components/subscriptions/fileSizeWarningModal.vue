<template>
    <!-- Modal -->
    <div class="modal fade" id="ifFileUploadGreaterThanSegDuration" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5  class="modal-title text-dark" id="exampleModalLongTitle">Uploaded File duration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="color: #0c0c0c">Uploaded file duration is greater than what this rate card has.Kindly check your file.</p> <br>
                    <p><b class="text-info">Uploaded file duration: </b>{{file_durations}}s</p>
                    <p><b class="text-info">Available durations for this segment :</b> {{segments_headings.sec1}}s, {{segments_headings.sec2}}s,
                        {{segments_headings.sec3}}, {{segments_headings.sec4}}s, {{segments_headings.sec5}}s</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Got it</button>

                </div>
            </div>
        </div>
    </div>


</template>

<script>

    export default {
        props :['segments_heading','file_durations',],
        name : 'fileSizeWarningModal',

        mounted(){


        },
        data(){
            return {
                r_animate : '',
            }
        },
        methods: {
        },

        computed:{

        },

    }

</script>

