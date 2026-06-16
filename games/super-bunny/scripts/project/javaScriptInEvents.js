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

// ✅ STEP 1: Load GPT script dynamically
const gptScript = document.createElement("script");
gptScript.async = true;
gptScript.src = "https://securepubads.g.doubleclick.net/tag/js/gpt.js";
gptScript.crossOrigin = "anonymous";
document.head.appendChild(gptScript);

// ✅ STEP 2: Style not required since no DOM elements needed

// ✅ STEP 3: GPT Interstitial Logic
window.googletag = window.googletag || { cmd: [] };
let gamingInterstitialSlot;
let slotReadyEventGlobal = null; // We will store this for manual trigger

function pauseGame() {
  // Add your game's pause logic here
  console.log("Game Paused");
}

function resumeGame() {
  // Add your game's resume logic here
  console.log("Game Resumed");
}

function defineGamingInterstitialSlot() {
  gamingInterstitialSlot = googletag.defineOutOfPageSlot(
    "/23324356353/t4", // 🔁 Replace with your ad unit path
    googletag.enums.OutOfPageFormat.GAME_MANUAL_INTERSTITIAL
  );

  if (gamingInterstitialSlot) {
    gamingInterstitialSlot.addService(googletag.pubads());
    console.log("Interstitial slot defined and waiting...");
    return true;
  } else {
    console.warn("Interstitial not supported on this device.");
    return false;
  }
}

function addGamingInterstitialListeners() {
  googletag.pubads().addEventListener("gameManualInterstitialSlotReady", (slotReadyEvent) => {
    if (gamingInterstitialSlot === slotReadyEvent.slot) {
      console.log("Interstitial is ready to be shown.");
      slotReadyEventGlobal = slotReadyEvent; // Save reference for manual call
    }
  });

  googletag.pubads().addEventListener("gameManualInterstitialSlotClosed", () => {
    console.log("Interstitial closed, recreating slot...");
    if (gamingInterstitialSlot) {
      googletag.destroySlots([gamingInterstitialSlot]);
    }
    if (defineGamingInterstitialSlot()) {
      googletag.display(gamingInterstitialSlot);
    }
    resumeGame();
  });
}

// ✅ Step 4: Load everything after GPT script is ready
gptScript.onload = function () {
  googletag.cmd.push(() => {
    defineGamingInterstitialSlot();
    addGamingInterstitialListeners();

    // Optional static ad slot (can remove if unused)
    googletag.defineSlot("/23324356353/t4", [100, 100], "static-ad-1")
      .addService(googletag.pubads());

    googletag.pubads().enableSingleRequest();
    googletag.enableServices();

    if (gamingInterstitialSlot) {
      googletag.display(gamingInterstitialSlot);
    }
  });
};

// ✅ ✅ ✅ CALL THIS FUNCTION FROM CONSTRUCT 3 WHEN YOU WANT TO SHOW AD
window.showInterstitialAd = function () {
  if (slotReadyEventGlobal) {
    pauseGame(); // Pause your game
    slotReadyEventGlobal.makeGameManualInterstitialVisible(); // Show ad
    console.log("Showing interstitial ad...");
  } else {
    console.warn("Ad not ready yet.");
  }
};


const scriptsInEvents = {

	async Start_Event1_Act7(runtime, localVars)
	{
		const script = document.createElement('script');
		script.async = true;
		script.src = 'https://securepubads.g.doubleclick.net/tag/js/gpt.js';
		document.head.appendChild(script);
	},

	async Levels_Event140_Act2(runtime, localVars)
	{
		window.showInterstitialAd();
	},

	async Levels_Event164_Act2(runtime, localVars)
	{
		showRewardedAd();
	},

	async Levels_Event180_Act1(runtime, localVars)
	{

	},

	async Levels_Event182_Act8(runtime, localVars)
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
		
	}
};

globalThis.C3.JavaScriptInEvents = scriptsInEvents;
