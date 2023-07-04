if ("serviceworker" in navigator) {
    navigator.serviceWorker.register("sw.js").then(registration => {
        console.log("SW registered");
        console.log(registration);
    }).catch(error => {
        console.log("SW Registration Failed");
        console.log(error);
    })
} OneSignal.push(function () {
    OneSignal.showNativePrompt();
});
