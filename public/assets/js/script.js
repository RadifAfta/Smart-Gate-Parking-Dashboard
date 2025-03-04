document.getElementById("toggleButton").addEventListener("click", GateClosed);
    function GateClosed(){
        let status;
        status = database.ref('/isGateOpen').set(false);
        alert('gerbang sukses di tutup ');


}