plugin.tx_in2contact_pi1 {
    view {
        templateRootPaths {
            0 = EXT:in2contact/Resources/Private/Templates/
            1 = {$plugin.tx_in2contact_pi1.view.templateRootPath}
        }
        partialRootPaths {
            0 = EXT:in2contact/Resources/Private/Partials/
            1 = {$plugin.tx_in2contact_pi1.view.partialRootPath}
        }
        layoutRootPaths {
            0 = EXT:in2contact/Resources/Private/Layouts/
            1 = {$plugin.tx_in2contact_pi1.view.layoutRootPath}
        }
    }
    features {
        skipDefaultArguments = 1
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        callDefaultActionIfActionCantBeResolved = 1
    }
}

page {
    includeCSS.in2contact = EXT:in2contact/Resources/Public/Css/Main.css
}
