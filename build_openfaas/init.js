/*
 *  Place copyright or other info here...
 */

(function(global, $){
    
    // Define core
    var codiad = global.codiad,
        scripts= document.getElementsByTagName('script'),
        path = scripts[scripts.length-1].src.split('?')[0],
        curpath = path.split('/').slice(0, -1).join('/')+'/';
    codiad.ofbuild = {
        path: curpath,
        build: function() {
            codiad.modal.load(500, this.path+'test.php'+'?path='+curpath)
        }
    }
})(this, jQuery);

