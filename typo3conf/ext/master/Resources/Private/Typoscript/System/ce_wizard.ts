mod.wizards.newContentElement.wizardItems {
    Custom {
        header = LLL:EXT:master/Resources/Private/Language/fce.xlf:fce.customtab
        show = master_Well_html
        position = 1
        key = master
        elements {
            master_Well_html {
                iconIdentifier = iconWell
                title = LLL:EXT:master/Resources/Private/Language/fce.xlf:fce.well
                description = LLL:EXT:master/Resources/Private/Language/fce.xlf:fce.well.description
                tt_content_defValues {
                    CType = fluidcontent_content
                    tx_fed_fcefile = master:Well.html
                }
            }
             master_GridContainer_html {
                iconIdentifier = iconWell
                title = LLL:EXT:master/Resources/Private/Language/fce.xlf:fce.gridcontainer
                description = LLL:EXT:master/Resources/Private/Language/fce.xlf:fce.gridcontainer.description
                tt_content_defValues {
                    CType = fluidcontent_content
                    tx_fed_fcefile = master:GridContainer.html
                }
            }
        }
    }
}