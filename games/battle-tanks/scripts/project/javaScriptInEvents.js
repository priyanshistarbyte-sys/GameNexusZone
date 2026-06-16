

const scriptsInEvents = {

	async Game_completed_event_Event2_Act1(runtime, localVars)
	{
		window.showInterstitialAd();
	},

	async Game_over_event_Event2_Act1(runtime, localVars)
	{
		window.showInterstitialAd();
	}
};

globalThis.C3.JavaScriptInEvents = scriptsInEvents;
