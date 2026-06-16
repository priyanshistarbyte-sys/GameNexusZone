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

	async Gameplay_sheet_Event30_Act7(runtime, localVars)
	{
		window.showInterstitialAd();
	}
};

globalThis.C3.JavaScriptInEvents = scriptsInEvents;
