function showRewardedAd() {
  if (window.rewardedAdEvent) {
    console.log("Showing rewarded ad now...");
    window.rewardedAdEvent.makeRewardedVisible();

    // Optional: reset the event so it's not shown twice
    window.rewardedAdEvent = null;
  } else {
    console.log("Rewarded ad is not ready to be shown.");
    // Ad not ready - call fallback function in Construct 3
    c3_callFunction("rewardedadnotready");
  }
}


const scriptsInEvents = {

	async EventGameplay_Event30_Act1(runtime, localVars)
	{
		let rewardedSlot = null;
		let rewardedAdCompleted = false;
		
		window.googletag = window.googletag || { cmd: [] };
		
		googletag.cmd.push(function () {
		  try {
		    console.log("[Ad] Starting rewarded ad setup...");
		
		    rewardedSlot = googletag
		      .defineOutOfPageSlot('/23324356353/t3', googletag.enums.OutOfPageFormat.REWARDED)
		      .addService(googletag.pubads());
		
		    console.log("[Ad] Slot defined.");
		
		    googletag.enableServices();
		    console.log("[Ad] Services enabled.");
		
		    googletag.display(rewardedSlot);
		    console.log("[Ad] Ad display requested.");
		
		    googletag.pubads().addEventListener("rewardedSlotReady", function (evt) {
		      console.log("[Ad] Rewarded ad is READY.");
		      window.rewardedAdEvent = evt;
		      c3_callFunction("rewardedadready");
		    });
		
		    googletag.pubads().addEventListener("rewardedSlotGranted", function () {
		      console.log("[Ad] User watched FULL ad. Will grant reward.");
		      rewardedAdCompleted = true;
		    });
		
		    googletag.pubads().addEventListener("rewardedSlotClosed", function () {
		      console.log("[Ad] Ad CLOSED by user.");
		
		      if (rewardedAdCompleted) {
		        console.log("[Ad] Granting reward → calling: gratifyuser()");
		        c3_callFunction("gratifyuser");
		      } else {
		        console.log("[Ad] Ad not fully watched → calling: gameover()");
		        c3_callFunction("gameover");
		      }
		
		      googletag.destroySlots([rewardedSlot]);
		      console.log("[Ad] Slot destroyed.");
		
		      rewardedSlot = null;
		      rewardedAdCompleted = false;
		    });
		
		    setTimeout(() => {
		      if (!window.rewardedAdEvent) {
		        console.log("[Ad] Ad not ready within 5 seconds → calling: rewardedadnotready()");
		        c3_callFunction("rewardedadnotready");
		      }
		    }, 5000);
		
		  } catch (error) {
		    console.error("[Ad] Error during rewarded ad setup:", error);
		    c3_callFunction("rewardedadnotready");
		  }
		});
		
	},

	async EventGameplay_Event35_Act2(runtime, localVars)
	{
		showRewardedAd();
	},

	async EventMenu_Event17_Act1(runtime, localVars)
	{
		const script = document.createElement('script');
		script.async = true;
		script.src = 'https://securepubads.g.doubleclick.net/tag/js/gpt.js';
		document.head.appendChild(script);
	}
};

globalThis.C3.JavaScriptInEvents = scriptsInEvents;
