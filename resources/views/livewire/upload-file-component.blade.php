<form wire:submit="Save" >
    <div class="row">
        <div class="col-sm-6" x-data="{ has_file: false }">
            <div class="input-group"  @finished="alert('ok')">
                <input accept="@foreach($accepted_format as $format) video/{{$format}}, @endforeach" type="file" id="myFile" name="myFile" @change="has_file = $el.files[0]" onchange="uploadChunks(this)" class="form-control">
                <button type="button" :class="has_file?'':'d-none'" @click="has_file=false" class="btn btn-secondary" onclick="stopUpload()">Cancel Upload</button>
            </div>
            <div :class="has_file?'':'d-none'" class="progress mt-2" wire:ignore role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" id="progress"  style="width: 0%"></div>
            </div>
        </div>
    </div>
</form>
@push('child-script')
 <script>
        var chnkStarts  = [];   
        function uploadChunks(el)
        {
            // File Details
            const file = el.files[0];

            // Sent along with next call
            const extension = file.name.slice((file.name.lastIndexOf(".") - 1 >>> 0) + 2);
            if (!@js($accepted_format).includes(extension)) {
                el.value=null;
                alert("The file must be a video format");
                return false;
            }
            @this.set('fileName', getRandomString(30)+"."+extension, false);
            @this.set('fileSize',file.size, false);
            
            // Upload first chunk of file
            livewireUploadChunk( file, 0 );
        }

        var myVar = [];

        function livewireUploadChunk( file, start ) 
        {
            // Get chunk from start
            const chunkEnd  = Math.min( start + @js($chunkSize), file.size );
            const chunk     = file.slice( start, chunkEnd ); 
            let progress = parseInt(100 + ((start - file.size  ) / (file.size) * 100)); 
            if (file.size == chunkEnd) {
                //if file can be uploaded only once
                progress=100;
            }
            document.getElementById('progress').style.width  = progress+"%";
            document.getElementById('progress').setAttribute('data-progress',progress);
            @this.upload('fileChunk', chunk, (uName)=>{}, ()=>{}, (event) => {
                // Progress callback.

                if( event.detail.progress == 100 ){
                    // We recursively call livewireUploadChunk from within itself
                    start = chunkEnd;
                    if( start < file.size ){
                        let _time = Math.floor((Math.random() * 2000) + 1);
                        console.log('sleeping ',_time,'before next chunk upload');
                        var TimeNo = setTimeout( livewireUploadChunk, _time, file, start );
                        myVar.push(TimeNo);
                    }
                }
            });     
        }

        function stopUpload(){
            document.getElementById('progress').style.width  = "0%";
            document.getElementById('progress').setAttribute('data-progress',0);
            document.getElementById('myFile').value=null;

            //execute it twice to make it sure
            stopTimeOut();
            stopTimeOut();
        }
        function stopTimeOut(){
            myVar.forEach(function( item, key){
                clearTimeout(myVar[key]);
            });
        }

        function getRandomString(length){
            return Array(length).fill('')
            .map(() => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' [Math.floor(Math.random() * 62)]).join('')
        }
    </script>
    @endpush