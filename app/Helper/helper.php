<?php 


// General Settings
function generalsettings()
{
    return \App\Models\GeneralSetting::first();
}

// Social Urls
function socialurls()
{
    return \App\Models\Socialurl::all();
}

// Color Settings
function colorSettings()
{
    return \App\Models\ColorSetting::first();
}

// ThemeSettings
function themesettings($user_id)
{
    return \App\Models\ThemeSetting::where('user_id', $user_id)->first();
}

// NexmoSetting 
function nexmosetting()
{
    return \App\Models\NexmoSetting::first();
}

// Hideshow 
function hideshow()
{
    return \App\Models\HideShow::first();
}

//Location
function setLoction(){
    return \App\Models\SetLocation::first();
}

// Offers 
function offers()
{
    return \App\Models\Offer::where('status', 'show')->get();
}