import React from 'react'
import {
  Button,
  TextField,
  Dialog,
  DialogActions,
  DialogContent,
  DialogContentText,
  DialogTitle,
} from '@mui/material'
import KeyboardArrowDownIcon from '@mui/icons-material/KeyboardArrowDown'

interface Props {
  title: string
}

const FormDialog: React.VFC<Props> = (props) => {
  const [open, setOpen] = React.useState(false)

  const handleClickOpen = () => {
    setOpen(true)
  }

  const handleClose = () => {
    setOpen(false)
  }

  return (
    <>
      <Button onClick={handleClickOpen} endIcon={<KeyboardArrowDownIcon />}>
        {props.title}を追加する
      </Button>
      <Dialog open={open} onClose={handleClose}>
        <DialogTitle>{props.title}名を追加する</DialogTitle>
        <DialogContent>
          <DialogContentText>
            {props.title}名を追加してください。
          </DialogContentText>
          <TextField
            autoFocus
            margin="dense"
            id="name"
            label={props.title + '名'}
            fullWidth
            variant="standard"
          />
        </DialogContent>
        <DialogActions>
          <Button onClick={handleClose}>キャンセル</Button>
          <Button onClick={handleClose}>追加する</Button>
        </DialogActions>
      </Dialog>
    </>
  )
}

export default FormDialog
