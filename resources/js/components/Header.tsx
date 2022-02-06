import React from 'react'
import AppBar from '@mui/material/AppBar'
import Toolbar from '@mui/material/Toolbar'
import Styles from '@/sass/Layout/Header.module.scss'
import IconButton from '@mui/material/IconButton'
import Button from '@mui/material/Button'
import MenuIcon from '@mui/icons-material/Menu'

const Header: React.VFC<{ toggleIsOpen: () => void }> = ({ toggleIsOpen }) => {
  return (
    <AppBar
      position="fixed"
      sx={{ zIndex: (theme) => theme.zIndex.drawer + 1 }}
    >
      <Toolbar className={Styles.appBar} variant="dense">
        <Button
          href="/item"
          sx={{
            fontSize: 20,
            fontWeight: 100,
            color: 'grey.700',
            padding: '0 1rem',
          }}
        >
          HIGHLIGHT
        </Button>
        <IconButton
          onClick={toggleIsOpen}
          className={Styles.icon}
          size="medium"
          edge="start"
          aria-label="menu"
          sx={{ ml: 'auto' }}
        >
          <MenuIcon />
        </IconButton>
      </Toolbar>
    </AppBar>
  )
}

export default Header
