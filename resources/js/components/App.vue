<template>
    <div>
       <div class="row ">
            <div class="col-md-3">
               
            </div>
            <div class="col-md-7">
                <form>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Write your post here"></textarea>
                    </div>
                     <div class="form-group">
                         <input class="form-control-file" type="file">
                     </div>
                      <div class="form-group">
                          <label>Type:</label>
                         <select>
                            <option value="getHelp">Get help</option>
                             <option value="doHelp">Do help</option>
                        </select>
                     </div>
                     <div class="form-group">
                         <label>Category:</label>
                         <div class="checkbox">
                             <label><input type="checkbox" value="">Kidney</label>
                         </div>
                         <div class="checkbox">
                             <label><input type="checkbox" value="">Blood</label>
                         </div>
                         <div class="checkbox">
                             <label><input type="checkbox" value="">Eyes</label>
                         </div>
                     </div>
                     
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary mb-2">Submit</button>
                      </div>
                
                
                
                </form>
            </div>
       </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style  scoped>

.helping_words{
    background-color: black;
}
</style>